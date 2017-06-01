<?php
class HomenewCourse extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_course';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('link', 'is_hot','is_sale', 'is_new',
        'weight_number','course_id', 'image_url', 'group_id');
    protected $dates = ['deleted_at'];

    public static function commonGetListCourse($class, $menuId, $limit = NULL, $subjectId = null)
    {
        $now = time();
        $class = $class -1;
        $menu = Menus::find($menuId);
        $packageGroupId = $menu->package_group_id;
        
        $list = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
            ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
            ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
            ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
            ->where('mdl_hocmai_package_group.id', $packageGroupId)
            //hiển thị khoá học theo package
            // ->where('mdl_subject.hocba', ACTIVE)
            ->where('package.starttime', '<', $now)
            ->where('package.finishtime', '>', $now)
            ->class($class)
            ->visible()
            ->where('mdl_hocmai_package_group.time_start', '<', $now)
            ->where('mdl_hocmai_package_group.time_end', '>', $now);
            
        if ($subjectId) {
            $list = $list->subject($subjectId);
        }
        $list = $list->select('mdl_course.id as courseId', 'mdl_course.fullname', 
                'package.fee',
                'package.finishtime', 'mdl_subject.name as subject_name',
                'package.id as packageId', 'mdl_hocmai_package_group.id as groupId');
        if ($limit) {
            return $list = $list->limit($limit)->get();
        }
        return $list->get();
    }
    public static function getListCourse($class, $menuId, $subjectId = null)
    {
        return self::commonGetListCourse($class, $menuId, null, $subjectId);
    }
    public static function getListCourseHot($class, $menuId, $limit)
    {
        return self::commonGetListCourse($class, $menuId, $limit);
    }

    public static function getCourseByClassSubjectGroup($classId, $subjectId, $groupId)
    {
        $now = time();
        $class = $classId -1;
        
        $list = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
            ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
            ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
            ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
            ->where('mdl_hocmai_package_group.id', $groupId)
            //hiển thị khoá học theo package
            // ->where('mdl_subject.hocba', ACTIVE)
            ->where('package.starttime', '<', $now)
            ->where('package.finishtime', '>', $now)
            ->class($class)
            ->visible()
            ->where('mdl_hocmai_package_group.time_start', '<', $now)
            ->where('mdl_hocmai_package_group.time_end', '>', $now);
            
        if ($subjectId) {
            $list = $list->subject($subjectId);
        }
        $list = $list->select('mdl_course.id as course_id', 'mdl_course.fullname', 
                'package.fee',
                'package.finishtime', 'mdl_subject.name as subject_name',
                'package.id as package_id', 'mdl_hocmai_package_group.id as group_id');
        return $list->get();
    }

}

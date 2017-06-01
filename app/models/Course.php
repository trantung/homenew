<?php

class Course extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_course';

    public function Teacher() 
    {
        return $this->belongsToMany('Teacher', 'mdl_course_teacher', 'course_id', 'teacher_id');
    }
    // public static function queryGetCourse()
    // {
    //     $now = time();
    //     $query = self::leftJoin('mdl_homenew_course', 'mdl_course.id', '=', 'mdl_homenew_course.course_id')
    //         ->join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
    //         ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
    //         ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
    //         ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
    //         ->where('mdl_course.visible', ACTIVE)
    //         ->where('mdl_subject.hocba', ACTIVE)
    //         ->where('package.starttime', '<', $now)
    //         ->where('package.finishtime', '>', $now);
    //         // ->where('mdl_hocmai_package_group.time_start', '<', $now)
    //         // ->where('mdl_hocmai_package_group.time_end', '>', $now);
    //     return $query;
    // }
    public static function queryGetCourse()
    {
        $now = time();
        $query = self::leftJoin('mdl_homenew_course', 'mdl_course.id', '=', 'mdl_homenew_course.course_id')
            ->join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
            ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
            ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
            ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
            // ->join('mdl_course_teacher', 'mdl_course_teacher.course_id', '=', 'packageCourse.courseid')
            ->where('mdl_course.visible', ACTIVE)
            // ->where('mdl_subject.hocba', ACTIVE)
            ->where('package.starttime', '<', $now)
            ->where('package.finishtime', '>', $now);
            // ->where('mdl_hocmai_package_group.time_start', '<', $now)
            // ->where('mdl_hocmai_package_group.time_end', '>', $now);
        return $query;
    }

    public static function getCourseById($id = NULL)
    {
        $query = self::queryGetCourse();
        if ($id) {
            $data = $query->where('mdl_course.id', $id)
                ->select('mdl_course.id as courseId', 'mdl_course.fullname', 
                    'package.fee as cost',
                    'package.finishtime as finish_time', 'mdl_subject.name as subject_name', 'mdl_subject.id as subject_id',
                    'package.id as packageId', 'mdl_hocmai_package_group.id as groupId', 'mdl_homenew_course.is_hot as is_hot',
                    'mdl_homenew_course.is_sale as is_sale', 'mdl_homenew_course.is_new as is_new',
                    // 'mdl_course_teacher.teacher_id',
                    'mdl_homenew_course.image_url as image_url')
                ->orderBy('packageId', 'desc')
                ->first();
            if ($data) {
                return $data;
            }
            return null;
        }
        return null;
    }
    
    public static function getAllCourse()
    {
        $query = self::queryGetCourse();
        $data = $query->select('mdl_course.id', 'mdl_course.fullname', 'mdl_homenew_course.is_hot', 'mdl_homenew_course.is_sale',
             'mdl_homenew_course.is_new', 'mdl_homenew_course.weight_number', 'mdl_homenew_course.image_url')
            ->orderBy('mdl_homenew_course.weight_number', 'asc')
            ->paginate(PAGINATE);
        return $data;
    }
    public static function getAllCourseBySearch($input)
    {
        $query = self::queryGetCourse();
        $data = $query->where(function ($query) use ($input) {
                foreach ($input as $key => $value) {
                    if($input[$key]) {
                        $query = $query->where('mdl_course.' . $key, 'like', '%' . $value . '%');
                    }
                }
            })
            ->select('mdl_course.id', 'mdl_course.fullname', 'mdl_homenew_course.is_hot', 'mdl_homenew_course.is_sale',
             'mdl_homenew_course.is_new', 'mdl_homenew_course.weight_number', 'mdl_homenew_course.image_url')
            ->orderBy('mdl_homenew_course.weight_number', 'asc')
            ->paginate(PAGINATE);
        return $data;
    }

    public function scopeSubject($query, $subjectId) {
        return $query->where('subject', $subjectId);
    }

    public function scopeClass($query, $classId) {
        return $query->where('class_id', $classId);
    }

    public function scopeVisible($query) {
        return $query->where('visible', ACTIVE);
    }

}

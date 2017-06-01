<?php

class TeacherSetup extends Eloquent  {
	use SoftDeletingTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_teachers';

    protected $fillable = array('teacher_id', 'birthday','description', 
        'record', 'facebook', 'image',  'image_detail', 'live_in', 
        'weight_number', 'hightlight', 'slogan', 'active');

    protected $dates = ['deleted_at'];

    public function documents() 
    {
        return $this->belongsToMany('Documents', 'mdl_homenew_relation_document_teacher', 'document_id', 'teacher_id');
    }

    public static function getSubjectByTeacher($teacherId)
    {
        $listCount = \CourseTeacher::where('teacher_id', $teacherId)->lists('course_id');
        $listSubjectid = \Course::whereIn('id', $listCount)->lists('subject');
        $listSubject = \Subject::whereIn('id', $listSubjectid)->where('hocba', ACTIVE)->lists('name', 'id');
        return $listSubject;
    }

}

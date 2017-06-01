<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CourseTeacherManagerFree extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_course_teacher_manager_free';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('link', 'course_group_id', 'name', 'sapo', 
        'description','teacher_id', 'subject_id', 'image_url_teacher', 
        'image_url' ,'status', 'groupid', 'class_id');
    protected $dates = ['deleted_at'];

}

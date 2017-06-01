<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Documents extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_documents';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name','description', 'weight_number','link_url', 'image_url', 'files', 'status');
    protected $dates = ['deleted_at'];

    public function documentTeacher() 
    {
        return $this->belongsToMany('Teacher', 'mdl_homenew_relation_document_teacher', 'document_id', 'teacher_id');
    }

    public function teachers() 
    {
        return $this->belongsToMany('TeacherSetup', 'mdl_homenew_relation_document_teacher', 'document_id', 'teacher_id');
    }

    public function slidesStudent($id)
    {
        return $this->belongsToMany('TeacherSetup', 'mdl_homenew_relation_document_teacher', 'document_id', 'teacher_id')->where('teacher_id','=', $id);
    }
}

<?php

class SlideClass extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_slide_class';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('class_id','slide_id');
    protected $dates = ['deleted_at'];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}

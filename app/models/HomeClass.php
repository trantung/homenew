<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HomeClass extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_class';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('block_id','name', 'status', 'default', 'weight_number');
    protected $dates = ['deleted_at'];

    public function slidesFull()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_class', 'class_id', 'slide_id')->where('display_type','=', TYPE_SLIDE_FULL)->orderBy('weight_number');
    }
    public function slidesStudent()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_class', 'class_id', 'slide_id')->where('display_type','=', TYPE_SLIDE_STUDENT)->orderBy('weight_number');
    }

}

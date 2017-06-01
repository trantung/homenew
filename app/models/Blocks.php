<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Blocks extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_block';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name', 'description','status','logo','weight_number','color_code');
    protected $dates = ['deleted_at'];

    public function typeNews() 
    {
        return $this->belongsToMany('TypeNews', 'news','block_id', 'type_new_id');
    }

    public function slides()
    {
        return $this->hasMany('Slide', 'block_id');
    }

    public function slidesStudent()
    {
        return $this->hasMany('Slide', 'block_id')->where('display_type','=', TYPE_SLIDE_STUDENT)->orderBy('weight_number');
    }

    public function slidesFull()
    {
        return $this->hasMany('Slide', 'block_id')->where('display_type','=', TYPE_SLIDE_FULL)->orderBy('weight_number');
    }

    public function slidesRow()
    {
        return $this->hasMany('Slide', 'block_id')->where('display_type','=', TYPE_SLIDE_ROW)->orderBy('weight_number');
    }
}

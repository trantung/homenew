<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Menus extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_menu';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('class_id','name', 'link','status', 'weight_number', 'package_group_id', 'block_id');
    protected $dates = ['deleted_at'];

    public function pupilClass() 
    {
        return $this->belongsToMany('HomeClass', 'mdl_homenew_menu_class', 'menu_id', 'class_id');
    }

    public function hasTypeNews() 
    {
        return $this->belongsToMany('TypeNews', 'mdl_homenew_type_news_menu', 'menu_id', 'type_news_id');
    }

    public function slides()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_menus', 'menu_id', 'slide_id');
    }

    public function slidesStudent()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_menus', 'menu_id', 'slide_id')->where('display_type','=', TYPE_SLIDE_STUDENT)->orderBy('weight_number');
    }

    public function slidesFull()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_menus', 'menu_id', 'slide_id')->where('display_type','=', TYPE_SLIDE_FULL)->orderBy('weight_number');
    }

    public function slidesRow()
    {
        return $this->belongsToMany('Slide', 'mdl_homenew_slide_menus', 'menu_id', 'slide_id')->where('display_type','=', TYPE_SLIDE_ROW)->orderBy('weight_number');
    }

}

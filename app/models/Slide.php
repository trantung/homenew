<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Slide extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_slide';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('block_id', 'name','image_url','image_url_mobile','description','weight_number',
        'display_type', 'status', 'link_url', 'start_time', 'finish_time', 'expire_time', 'expire_alert', 'note');
    protected $dates = ['deleted_at'];

    public function hasClass() 
    {
        return $this->belongsToMany('HomeClass', 'mdl_homenew_slide_class', 'slide_id', 'class_id');
    }

    public function hasMenu() 
    {
        return $this->belongsToMany('Menus', 'mdl_homenew_slide_menus', 'slide_id', 'menu_id');
    }

    public function block()
    {
        return $this->belongsTo('Blocks', 'block_id');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = strtotime($value);
    }

    public function setFinishTimeAttribute($value)
    {
        $this->attributes['finish_time'] = strtotime($value);
    }

    public function getStartTimeAttribute($value)
    {
        if ($value) {
            return date('d-m-Y H:i', $value);
        }
        
    }

    public function getFinishTimeAttribute($value)
    {
        if ($value) {
            return date('d-m-Y H:i', $value);
        }
    }

}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Banners extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_banners';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('block_id','name', 'description','link_url','status', 'image_url', 'image_url_mobile', 'model_id', 'model_name', 'time_start', 'time_end', 'expire_time', 'position');
    protected $dates = ['deleted_at'];

    public function setTimeStartAttribute($value)
    {
        $this->attributes['time_start'] = strtotime($value);
    }

    public function setTimeEndAttribute($value)
    {
        $this->attributes['time_end'] = strtotime($value);
    }

    public function getTimeStartAttribute($value)
    {
        if ($value) {
            return date('d-m-Y', $value);
        }
    }

    public function getTimeEndAttribute($value)
    {
        if ($value) {
            return date('d-m-Y', $value);
        }
    }

}

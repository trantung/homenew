<?php

class SlideMenu extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_slide_menus';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('menu_id','slide_id');
    protected $dates = ['deleted_at'];
}

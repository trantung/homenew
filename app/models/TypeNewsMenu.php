<?php

class TypeNewsMenu extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_type_news_menu';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('type_news_id', 'menu_id', 'weight_number');
    protected $dates = ['deleted_at'];
}

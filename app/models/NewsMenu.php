<?php

class NewsMenu extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_news_menu';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('news_id', 'menu_id', 'weight_number');
    protected $dates = ['deleted_at'];
}

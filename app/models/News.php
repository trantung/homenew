<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class News extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_news';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('block_id', 'name','description', 
        'logo', 'link', 'weight_number', 'status', 'sapo', 'logo_mobile', 'is_hot', 'is_home');
    protected $dates = ['deleted_at'];

    public function typeNews() 
    {
        return $this->belongsToMany('TypeNews', 'mdl_homenew_relation_new_type', 'new_id', 'type_new_id');
    }

    public function hasMenu() 
    {
        return $this->belongsToMany('Menus', 'mdl_homenew_news_menu', 'news_id', 'menu_id');
    }

    public function hasBlock() 
    {
        return $this->belongsToMany('Blocks', 'mdl_homenew_news_blocks', 'news_id', 'block_id');
    }
}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TypeNews extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_type_news';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name','description', 'position', 'status', 'type', 'weight_number');
    protected $dates = ['deleted_at'];

    // public function blocks() 
    // {
    //     return $this->belongsToMany('Blocks', 'news', 'type_new_id', 'block_id');
    // }
    public function hasMenu() 
    {
        return $this->belongsToMany('Menus', 'mdl_homenew_type_news_menu', 'type_news_id', 'menu_id');
    }


    public function hasBlock() 
    {
        return $this->belongsToMany('Blocks', 'mdl_homenew_block_type_new', 'type_new_id', 'block_id');
    }
}

<?php

class BlockTypeNew extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_block_type_new';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('block_id','type_new_id');
    protected $dates = ['deleted_at'];
}

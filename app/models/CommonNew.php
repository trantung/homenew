<?php

class CommonNew extends Eloquent  {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_common_news';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('model_name','model_id', 'model_relation_name', 'model_relation_id');
}

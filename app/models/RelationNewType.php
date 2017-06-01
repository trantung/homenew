<?php

class RelationNewType extends Eloquent  {
    
    protected $table = 'mdl_homenew_relation_new_type';
    protected $fillable = array('new_id','type_new_id', 'weight_number');
}

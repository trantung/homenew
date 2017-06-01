<?php

class PermissionUser extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_permission_users';
    protected $fillable = array('username', 'block_id');
}

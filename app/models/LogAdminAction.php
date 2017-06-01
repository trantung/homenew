<?php
class LogAdminAction extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_log_admin_action';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('model_id','model_name', 'description','action', 'by_user');
    protected $dates = ['deleted_at'];

}

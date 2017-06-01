<?php

class SlideConfig extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_slide_config';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('model_name', 'model_id','time', 'title');
    protected $dates = ['deleted_at'];

    public static function getTime($modelId, $modelName)
    {
        if ($data = SlideConfig::where('model_name', $modelName)->where('model_id', $modelId)->first()) {
            return $data->time;
        }
        return 0;
    }

}

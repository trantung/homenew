<?php

class MenuClass extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_homenew_menu_class';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('class_id', 'menu_id', 'weight_number');
    protected $dates = ['deleted_at'];

    public static function getClassByMenu($menuId)
    {
        $response = [];
        $data = MenuClass::where('menu_id', $menuId)->lists('class_id');
        foreach ($data as $key => $value) {
            if ($value > 5 && $value < 10) {
                $response[THCS_BLOCK][] = $value;
            }
            if ($value > 10) {
                $response[THPT_BLOCK][] = $value;
            }
        }
        return $response;
    }
}

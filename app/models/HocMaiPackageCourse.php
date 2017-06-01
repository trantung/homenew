<?php


class HocMaiPackageCourse extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_hocmai_package_course';
    protected $fillable = array('courseid','packageid'); 
}

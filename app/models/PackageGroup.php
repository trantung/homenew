<?php


class PackageGroup extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mdl_hocmai_package_group';

    public static function getGroupByBlock($block)
    {
    	if ($block == THPT_BLOCK) {
    		$min = 9;
    		$max = 13;
            $listGroupId = [110, 122, 118, 106, 107, 108, 121, 89, 120, 109, 70];
    	}
    	if ($block == THCS_BLOCK) {
    		$min = 5;
    		$max = 8;
            $listGroupId = [126,127,128,129,130];
    	}
    	if ($block == TH_BLOCK) {
    		$min = 0;
    		$max = 4;
            $listGroupId = [];
    	}
    	if ($block == SUPER_ADMIN) {
    		$min = 0;
    		$max = 13;
            $listGroupId = PackageGroup::lists('id');
    	}
        $now = time();
        $data = PackageGroup::whereIn('id', $listGroupId)->lists('name', 'id');
        // $query = self::join('mdl_hocmai_package as package', 'mdl_hocmai_package_group.id', '=', 'package.groupid')
        //     ->join('mdl_hocmai_package_course as package_course', 'package.id', '=', 'package_course.packageid')
        //     ->join('mdl_course as course', 'course.id', '=', 'package_course.packageid')
        //     ->where('course.visible', ACTIVE)
        //     ->where('course.class_id', '<=', $max)
        //     ->where('course.class_id', '>=', $min)
        //     ->where('package.starttime', '<', $now)
        //     ->where('package.finishtime', '>', $now)
        //     // ->where('mdl_hocmai_package_group.time_start', '<', $now)
        //     // ->where('mdl_hocmai_package_group.time_end', '>', $now)
        //     ->groupBy('mdl_hocmai_package_group.id')
        //     ->select(
        //         'mdl_hocmai_package_group.id as id', 
        //         'mdl_hocmai_package_group.name as code',
        //         'course.class_id'
        //     )
        //     ->get();
        //     // ->lists('code', 'id');
        //     // ->toSql();
        // foreach ($query as $value) {
        //     $data[$value->id] = $value->code . ' ( Lớp '.$value->class_id.' )';
        // }
        return $data;
    }

}

<?php
function getTypeSlide(){
    return array(1 => 'slide full', 
                 2 =>'slide row', 
                 3 => 'slide student');
}

function getPositionSlide(){
    return array(1 => 'Trên', 
                 2 =>'giữa', 
                 3 => 'Dưới');
}
function getPositionTypeNew(){
    return array(
        '' => 'Chọn',
        TYPE_ABOVE =>'Trang con phía trên', 
        TYPE_BELOW => 'Trang con phía dưới'
    );
}
//common return list on table
function returnList($className)
{
    $list = $className::lists('name', 'id');
    return $list;
}

function returnListonField($modelname, $field)
{
    $list = $modelname::lists($field, 'id');
    return $list;
}

function getAllDataModel($teacherId, $classId)
{
    // $list = $modelname::all();
    $list = CourseTeacherManagerFree::where('teacher_id', $teacherId)
        ->select('groupid')
        ->distinct()
        ->where('class_id', $classId)
        ->lists('groupid');
    return $list;
}

//get all hocmai package group
function getAllPackageGroup($code = null){
    if ($code) {
        $data = PackageGroup::where('time_start', '<', time())->where('time_end', '>', time())->lists($code, 'id');
        return $data;
    }
    $data = PackageGroup::where('time_start', '<', time())->where('time_end', '>', time())->lists('name', 'id');
    return $data;
}

function getTypeNewType()
{
    $type = [
        TYPE_HOME => 'Trang chủ',
        TYPE_CHILD => 'Trang con',
    ];
    return $type;
}

function getStatus()
{
    $status = [
        ACTIVE => 'Hiển thị',
        INACTIVE => 'Ẩn',
    ];
    return $status;
}

function getnameModel($modelname, $id){
        $data = $modelname::find($id);
        if($data)
            return $data->name;
        return '';
}
function getNameRelationByModel($modelName, $modelId, $modelRelation, $field){
    $list = CommonNew::select('model_relation_id')
        ->distinct()
        ->where('model_name', $modelName)
        ->where('model_id', $modelId)
        ->where('model_relation_name', $modelRelation)
        ->lists('model_relation_id');
    $array = $modelRelation::whereIn('id', $list)->lists($field);
    return implode(',', $array);
}
function getNameTypeByNews($modelName, $newId, $field){
	$list = RelationNewType::select('type_new_id')
        ->where('new_id', $newId)
        ->lists('type_new_id');
    $array = $modelName::whereIn('id', $list)->lists($field);
    return implode(',', $array);
}

function textParentCategory($input, $visible = true, $id = NULL)
{
    return array('placeholder' => $input, 'class' => 'form-control','id' => $id, 'visible' => $visible);
}
function getNameBlock($modelName, $id)
{
    $ob = $modelName::find($id);
    if ($ob->block_id > 0) {
        $block = Blocks::find($ob->block_id);
        return $block->name;
    }
    return 'Trang chủ';
}
function getStatusName($modelName, $id)
{
    $ob = $modelName::find($id);
    if ($ob->status == ACTIVE) {
        return 'Hiển thị';
    }
    return 'Ẩn';
}
function statusName($type){
    if($type == ACTIVE)
        return 'Hiển thị';
    return '';
}
function getDateCreated($value)
{
    $value = date('d-m-Y H:i:s',strtotime($value));
    return $value;
}
function getClass($value)
{
    if(isset($value)) {
        return $value;
    }
    return '';
}

function checkActive($value)
{
    if ($value == 0) {
        return 'active';
    }
    return '';
}
function getCssClassByBlockId($block, $class = NULL)
{
    if ($block > THPT_BLOCK) {
        if ($class) {
            return $class;
        }
        return 'review_mod';
    }
    return '';
}
function checkActiveClass($classId, $class = NULL)
{   
    if ($class) {
        if ($class == $classId) {
            return 'active';
        }
        return '';
    }
    $classCheck = HomeClass::find($classId);
    if ($classCheck->default == ACTIVE) {
        return 'active';
    }
    return '';
}
function returnListSubject($classId)
{
    $subject = Subject::where('hocba', 1)->lists('name', 'id');
    return $subject;
}
function convertTimeFormat($time)
{
    return date("d-m-Y", $time);
}
function getNameTeacherByCourse($courseId)
{
    $list = Teacher::join('mdl_course_teacher', 'mdl_course_teacher.teacher_id', '=', 'mdl_giaovien.id')
        ->where('mdl_course_teacher.course_id', $courseId)
        ->select('mdl_giaovien.hoten as name')
        ->groupBy('mdl_giaovien.id')->lists('name');
    return implode(',', $list);
}
function getGroupNameByCourse($courseId)
{
    $course = Course::find($courseId);
    if ($course) {
        if ($course->course_group == COURSE_GROUP_N2) {
            return 'N2';
        }
        if ($course->course_group == COURSE_GROUP_N3) {
            return 'N3';
        }
    return null;
    }
    return null;
}
function checkValueCourse($courseId, $groupId, $value)
{
    $check = HomenewCourse::where('course_id', $courseId)->where('group_id', $groupId)
        ->where($value, ACTIVE)->first();
    if ($check) {
        return true;
    }
    return false;
}
function getImageUrlFromHomeNewCourseByCourseId($courseId, $groupId)
{
    $check = HomenewCourse::where('course_id', $courseId)->where('group_id', $groupId)->first();
    if ($check) {
        return url(IMAGECOURSE. '/' . $check->image_url);
    }
    return null;
}
function getNameDisplayType($displayType)
{
    if ($displayType == 1) {
        return 'Kiểu slide full';
    }
    if ($displayType == 2) {
        return 'Kiểu slide row';
    }
    if ($displayType == 3) {
        return 'Kiểu slide student';
    }
}
function getNameBlockBySlide($slide)
{

    $block = Blocks::find($slide->block_id);
    if ($block) {
        return $block->name;
    } 
    if ($slide->block_id > 0) {
        return 'Không có khối';
    }
    return 'Trang chủ';
}
function getImageTeacher($imageLink)
{
    if(stripos($imageLink, 'http://') === false){
        $image = '/file.php/'.SITEID.'/'.$imageLink;
    }else{
        $image = $imageLink;
    }
    return $image;
}
function getClassConfig($top, $key)
{
    if ($key == 'company_life') {
        if ($top == 1) {
            return 'col-md-2';
        }
        if ($top == 2) {
            return 's-year s-item';
        }
        if ($top == 3) {
            return 's-number';
        }
        if ($top == 4) {
            return 's-mean';
        }
        return null;
    }
    if ($key == 'total_user') {
        if ($top == 1) {
            return 'col-md-4';
        }
        if ($top == 2) {
            return 's-user s-item';
        }
        if ($top == 3) {
            return 's-number';
        }
        if ($top == 4) {
            return 's-mean';
        }
        return null;
    }

    if ($key == 'total_course') {
        if ($top == 1) {
            return 'col-md-3';
        }
        if ($top == 2) {
            return 's-course';
        }
        if ($top == 3) {
            return 's-number';
        }
        if ($top == 4) {
            return 's-mean';
        }
        return null;
    }
    if ($key == 'total_teacher') {
        if ($top == 1) {
            return 'col-md-3';
        }
        if ($top == 2) {
            return 's-teacher s-item';
        }
        if ($top == 3) {
            return 's-number';
        }
        if ($top == 4) {
            return 's-mean';
        }
        return null;
    }
}
function getArrayWithoutLink()
{
    $config = HomeConfig::where('link', '')->orderBy('weight_number', 'asc')->get();
    return $config;
}
function getValueWithLink($key, $value)
{
    $config = HomeConfig::where('link', '!=', '')
        ->where('key', $key)->orderBy('weight_number', 'asc')->first();
    if ($config) {
        return $config->$value;
    }
    return null;
}
function getArrayWithLinkNotKey($arrayKey)
{
    $config = HomeConfig::where('link', '!=', '')
        ->whereNotIn('key', $arrayKey)->orderBy('weight_number', 'asc')->get();
    return $config;
    // if ($config) {
    //     return $config->$value;
    // }
    // return null;
}

function getClassByClassId($classId)
{
    if ($classId > 0 && $classId < 6) {
        return 'primary';
    }
    if ($classId > 5 && $classId < 10) {
        return 'secondary';
    }
    if ($classId > 9 && $classId < 14) {
        return 'before-tertiary';
    }
    return '';
}

function getBlockByClassId($classId)
{
    if ($classId > 0 && $classId < 6) {
        return 'tieu-hoc';
    }
    if ($classId > 5 && $classId < 10) {
        return THCS_BLOCK;
    }
    if ($classId > 9 && $classId < 14) {
        return THPT_BLOCK;
    }
    return '';
}

function checkPermissionBlock()
{
    global $USER;
    if ($USER) {
        if (in_array($USER->username, ['tungtt2@hocmai.vn', 'hocmai.kithuat'])) {
            return SUPER_ADMIN;
        }
        //THPT
        // if ($USER->username == 'oanhnk@hocmai.vn') {
        if (in_array($USER->username,['thaott2@hocmai.vn', 'oanhnk@hocmai.vn', 'test1@hocmai.vn'])) {
            return THPT_BLOCK;
        }
        //THCS + TH
        // if ($USER->username == 'tanlm@hocmai.vn') {
        if (in_array($USER->username,['tanlm@hocmai.vn', 'hadtt@hocmai.vn', 'test2@hocmai.vn'])) {
            return THCS_BLOCK;
        }
        //Trang chu
        if (in_array($USER->username,['lanhdv@hocmai.vn', 'hoangtm@hocmai.vn', 'test3@hocmai.vn', 'minhnv2@hocmai.vn'])) {
        // if ($USER->username == 'hocmai.kithuat') {
            return HOME_BLOCK;
        }
    }
    return BLOCK_ERROR;
}

function checkPermission($blockId = null)
{
    global $USER;
    if ($USER) {
        if (in_array($USER->username, ['tungtt2@hocmai.vn', 'hocmai.kithuat'])) {
            return true;
        }
        if (in_array($USER->username,['thaott2@hocmai.vn', 'oanhnk@hocmai.vn', 'test1@hocmai.vn']) && $blockId == THPT_BLOCK) {
            return true;
        }
        if (in_array($USER->username,['tanlm@hocmai.vn', 'hadtt@hocmai.vn', 'test2@hocmai.vn']) && $blockId == THCS_BLOCK) {
            return true;
        }
        if (in_array($USER->username,['tanlm@hocmai.vn', 'hadtt@hocmai.vn', 'test2@hocmai.vn']) && $blockId == TH_BLOCK) {
            return true;
        }
        if (in_array($USER->username,['lanhdv@hocmai.vn', 'hoangtm@hocmai.vn', 'test3@hocmai.vn', 'minhnv2@hocmai.vn']) && $blockId == BLOCK_HOME) {
            return true;
        }
        return null;
    }
}
function getDevice()
{
    //agent check tablet mobile desktop
    $agent = new Agent();
    if($agent->isMobile() || $agent->isTablet()) {
        return MOBILE;
    } else {
        return COMPUTER;
    }
}
function getImageUrlNewByDevice($value)
{
    $device = getDevice();
    if ($device == COMPUTER) {
        return IMAGENEWS. '/' . $value->logo;
    }
    if ($device == MOBILE) {
        return IMAGENEWS_MOBILE. '/' . $value->logo_mobile;
    }
}
function getNameImageUpload($input, $folder, $fieldName)
{
    if (!isset($input[$fieldName])) {
        return null;
    }
    if ($input[$fieldName]) {
        $image = Common::uploadImage($folder, $fieldName);
        return $image;
    }
}

function getTotalUserHocMai()
{
    return number_format(\User::count() + \UserArchive::count(), 0, '.', '.');
}

function getListClassByBlock($block)
{
    if ($block == THPT_BLOCK) {
        return [10,11,12];
    }
    if ($block == THCS_BLOCK) {
        return [6,7,8,9];
    }
    if ($block == THCS_BLOCK) {
        return [1,2,3,4,5];
    }
    if ($block == SUPER_ADMIN) {
        return [1,2,3,4,5,6,7,8,9,10,11,12];
    }
    if ($block == HOME_BLOCK) {
        return [];
    }
    return false;
}

function getMenuThcs()
{
    $arrMenu = MenuClass::whereBetween('class_id', array(6, 9))->lists('menu_id');
    $listMenu = Menus::whereIn('id', $arrMenu)->get()->toArray();
    foreach ($listMenu as $item) {
        $menu[$item['id']] = $item['name'] . ' (Lớp ' .implode(', ', MenuClass::where('menu_id', $item['id'])->lists('class_id')) . ')';
    }
    return $menu;
}

function getMenuByBlock()
{
    $listClass = getListClassByBlock(checkPermissionBlock());
    $arrMenu = MenuClass::whereIn('class_id',$listClass)->lists('menu_id');
    $listMenu = Menus::whereIn('id', $arrMenu)->get()->toArray();
    $menu = [];
    foreach ($listMenu as $item) {
        $menu[$item['id']] = $item['name'] . ' (Lớp ' .implode(', ', MenuClass::where('menu_id', $item['id'])->lists('class_id')) . ')';
    }
    return $menu;
}

function getNotification()
{
    $now = time();
    $data = Slide::where('expire_alert', ACTIVE)->where('finish_time', '<=', $now)->get()->toArray();
    return $data;
}

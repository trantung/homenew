<?php 

class ApiController extends BaseController {

	public function __construct() 
	{
		global $CFG;
		global $USER;
		$this->cfg = $CFG;
		$this->user = $USER;
		View::share('USER', $this->user);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getDataByModel($model) 
	{
		$data = $model::all();
		if (!$data->IsEmpty()) {
			$response['status'] = true;
			$response['message'] = 'Thành công';
			$response['data'] = $data;
		} else {
			$response['status'] = false;
		}
		return Response::json($response);
	}

	public function getCourseBySubject($subjectId, $classId)
	{
		$class = $classId - 1;
        $now = time();
        $listCourse = \Course::join('mdl_hocmai_package_course', 'mdl_course.id', '=', 'mdl_hocmai_package_course.courseid')
            ->join('mdl_hocmai_package', 'mdl_hocmai_package.id', '=', 'mdl_hocmai_package_course.packageid')
            ->where('mdl_course.subject', $subjectId)
            ->where('mdl_hocmai_package.starttime', '<=', $now)
            ->where('mdl_hocmai_package.finishtime', '>=', $now)
            ->where('mdl_hocmai_package.stopregtime', '>=', $now)
            ->where('mdl_course.class_id', $class)
            ->select('mdl_course.fullname', 'mdl_course.id', 'mdl_hocmai_package.groupid', 'mdl_hocmai_package.id as packageid')
            ->get();
        return \Response::json($listCourse);  
	}
	
	public function getGroupByBlock($blockId)
	{
		$data = \PackageGroup::getGroupByBlock($blockId);
		$response['status'] = true;
		$response['message'] = 'Thành công';
		$response['data'] = $data;
		return Response::json($response);
	}
	
	/*public function getCourseByClassSubjectGroup($classId, $subjectID, $groupId)
	{
		$listData = \HomenewCourse::getCourseByClassSubjectGroup($classId, $subjectID, $groupId);
		$data = [];
		foreach ($listData as $key => $value) {
			$data[$key] = new stdClass();
			$data[$key] = $value;
			$data[$key]->list_teacher = getNameTeacherByCourse($value->course_id);
		}
		return \View::make('shared.list-course')->with(compact('data'));
	}*/
	
	// public function getPackageByGroup($groupId)
	// {
	// 	$listData = \HocMaiPackage::where('groupid', $groupId)->get()->toArray();
	// 	dd($listData);
	// 	$data = [];
	// 	foreach ($listData as $key => $value) {
	// 		$data[$key] = new stdClass();
	// 		$data[$key] = $value;
	// 	}
	// 	return \View::make('shared.list-course')->with(compact('data'));
	// }
}
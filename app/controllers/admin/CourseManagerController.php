<?php

class CourseManagerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Course::getAllCourse();
        return View::make('admin.course.index')->with(compact('data'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList($groupId)
	{
		$now = time();
		$data = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
            ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
            ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
            ->join('mdl_course_teacher as course_teacher', 'course_teacher.course_id', '=', 'mdl_course.id')
            ->join('mdl_giaovien as giaovien', 'giaovien.id', '=', 'course_teacher.teacher_id')
            ->leftJoin('mdl_homenew_course', 'mdl_course.id', '=', 'mdl_homenew_course.course_id')
            // ->where('mdl_subject.hocba', ACTIVE)
            ->where('package.starttime', '<', $now)
            ->where('package.finishtime', '>', $now)
            ->where('mdl_hocmai_package_group.id', $groupId)
            ->visible()
            ->where('mdl_hocmai_package_group.time_start', '<', $now)
            ->where('mdl_hocmai_package_group.time_end', '>', $now);
        $data = $data->select('mdl_course.id as id', 'mdl_course.fullname', 
                'package.fee',
                'package.finishtime', 'mdl_homenew_course.is_hot', 
                'mdl_homenew_course.is_sale',
	            'mdl_homenew_course.is_new', 
	            'mdl_homenew_course.weight_number', 
	            'mdl_homenew_course.image_url',
                'giaovien.hoten as hoten')
        		->groupBy('mdl_course.id')
        ->get();
        if (count($data) > 0) {
        	return View::make('admin.course.list')->with(compact('data', 'groupId'));
        }
	}


	public function edit($id)
	{
		//test
		$now = time();
		// $data = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
  //           ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
  //           ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
  //           ->join('mdl_course_teacher as course_teacher', 'course_teacher.course_id', '=', 'mdl_course.id')
  //           ->join('mdl_giaovien as giaovien', 'giaovien.id', '=', 'course_teacher.teacher_id')
  //           // ->where('mdl_subject.hocba', ACTIVE)
  //           ->where('package.starttime', '<', $now)
  //           ->where('package.finishtime', '>', $now)
  //           ->visible()
  //           // ->where('mdl_hocmai_package_group.time_start', '<', $now)
  //           // ->where('mdl_hocmai_package_group.time_end', '>', $now)
  //           ->where('mdl_course.id', $id);
  //       $data = $data->select('mdl_course.id as courseId', 'mdl_course.fullname', 
  //               'package.fee',
  //               'package.finishtime',
  //               'giaovien.hoten as hoten')
  //       		->get();
		// //end
		$data = Course::getCourseById($id);
        $groupName = PackageGroup::find($data->groupId)->code;
		return View::make('admin.course.edit')->with(compact('data', 'id', 'groupName'));
	}

	public function update($id)
	{
		$input = Input::except('_token');
		$course = HomenewCourse::where('course_id', $id)->first();
		$input['course_id'] = $id;
		if($course){
			if($input['image_url']){
				$image = Common::uploadImage(IMAGECOURSE, 'image_url');
				$input['image_url'] = $image;
        	}else{
        		$input['image_url'] = $course->image_url;
        	}
        	$input['is_hot'] = isset($input['is_hot'])? $input['is_hot']: '0';
        	// $input['is_new'] = isset($input['is_new'])? $input['is_new']: '0';
        	$input['is_sale'] = isset($input['is_sale'])? $input['is_sale']: '0';
        	CommonNormal::update($course->id,$input);
		}else{
			$image = Common::uploadImage(IMAGECOURSE, 'image_url');
			$input['image_url'] = $image;
			$id = CommonNormal::create($input);
		}
		return Redirect::action('CourseManagerController@index')->with('group_id', $input['group_id']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function search()
	{
		$input = Input::except('page');
		$data = Course::getAllCourseBySearch($input);
		return View::make('admin.course.index')->with(compact('data'));
	}

	public function postCheckHot($id)
	{
		// $field = Input::only('field');
		$field = Input::get('field');
		$course = HomenewCourse::where('course_id', $id)->first();
		$input[$field] = (Input::get('checked') == 'true') ? ACTIVE : 0 ;
		if($course){
			CommonNormal::update($course->id,$input);
		} else {
			$input['course_id'] = $id;
			$id = CommonNormal::create($input);
		}
		$response['status'] = true;
		$response['message'] = 'Thành công';
		return Response::json($response);
	}

	public function getWeightNumber($type, $id, $groupId = null)
	{
		$model = CommonNormal::commonName();
		CommonAdmin::putEditWeightNumber($model, $type, $id, 'course_id');
		return Redirect::action('CourseManagerController@index')->with('group_id', $groupId);
	}

}

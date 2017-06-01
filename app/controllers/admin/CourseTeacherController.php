<?php

class CourseTeacherController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = CourseTeacherManagerFree::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.course_teacher.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.course_teacher.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('CourseTeacherController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			$image = Common::uploadImage(IMAGECOURSETEACHER, 'image_url');
			$imageTeacher = Common::uploadImage(IMAGECOURSETEACHER, 'image_url_teacher');
			$input['image_url'] = $image;
			$input['image_url_teacher'] = $imageTeacher;
			CommonNormal::create($input);
			return Redirect::action('CourseTeacherController@index') ;
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = CourseTeacherManagerFree::find($id);
		return View::make('admin.course_teacher.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = CourseTeacherManagerFree::find($id);
		$rules = array(
			'name'   => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('CourseTeacherController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	if($input['image_url']){
				$image = Common::uploadImage(IMAGECOURSETEACHER, 'image_url');
				$input['image_url'] = $image;
        	}else{
        		$input['image_url'] = $data->image_url;
        	}
        	if($input['image_url_teacher']){
				$imageTeacher = Common::uploadImage(IMAGECOURSETEACHER, 'image_url_teacher');
				$input['image_url_teacher'] = $imageTeacher;
        	}else{
        		$input['image_url_teacher'] = $data->image_url_teacher;
        	}
			CommonNormal::update($id,$input);
			return Redirect::action('CourseTeacherController@index') ;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('CourseTeacherController@index') ;
	}

	public function getTeacher($id)
	{
		$lstIdCourse = Course::where('subject', $id)->lists('id');		
		$listIdTeacher = CourseTeacher::whereIn('course_id', $lstIdCourse)->lists('teacher_id');
		$listTeacher = Teacher::whereIn('id', $listIdTeacher)->lists('hoten', 'id');
		return Response::json($listTeacher);
	}

	public function search()
	{
		$input = Input::except('page');
		$data = CourseTeacher::getAllCourseBySearch($input);
		return View::make('admin.course.index')->with(compact('data'));
	}

}

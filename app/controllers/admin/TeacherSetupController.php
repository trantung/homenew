<?php

class TeacherSetupController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $data = TeacherSetup::orderBy('id', 'desc')->paginate(PAGINATE);
		// $listTeacher = Teacher::where('listvisible', 0)->paginate(PAGINATE);
		// foreach ($listTeacher as $key => $value) {
		// 	$data[$key] = new stdClass();
		// 	$data[$key] = $value;
		// 	$data[$key]->info = TeacherSetup::where('teacher_id', $value->id)->first();
		// }
		$data = CommonSite::commonQuery();
		$data = $data->where('giaovien.listvisible', 0)
			->select('giaovien.id as id', 'giaovien.hoten as hoten', 
				'teacher.weight_number as weight_number',
				'teacher.hightlight as hightlight', 'teacher.active as active'
				)
			->groupBy('giaovien.id')
			->paginate(PAGINATE);
		return View::make('admin.teacher.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.teacher.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'teacher_id',
		);
		$inputAll = Input::except('_token');
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()){
			return Redirect::action('TeacherSetupController@create')
	            ->withErrors($validator);
        } else {        
        	$image = Common::uploadImage(IMAGE_TEACHER, 'image');
			$inputAll['image'] = $image;
        	$imageDetail = Common::uploadImage(IMAGE_TEACHER, 'image_detail');
			$inputAll['image_detail'] = $imageDetail;
			$inputAll['status'] = ACTIVE;
			$inputAll['hightlight'] = ACTIVE;
			$inputAll['active'] = ACTIVE;
			CommonNormal::create($inputAll);
			
			return Redirect::action('TeacherSetupController@index') ;
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
		$data = TeacherSetup::where('teacher_id', $id)->first();
		if ($data) {
			return View::make('admin.teacher.edit')->with(compact('data', 'id'));
		}
		return View::make('admin.teacher.create')->with(compact('id'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'teacher_id'   => 'required',
		);

		$input = Input::except('_token');
		$data = TeacherSetup::where('teacher_id', $id)->first();
		if (!$data) {
			$rules = array(
				'name'   => 'teacher_id',
			);
			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::action('TeacherSetupController@create')
		            ->withErrors($validator);
	        } else {        
	        	$image = Common::uploadImage(IMAGE_TEACHER, 'image');
				$input['image'] = $image;
				$imageDetail = Common::uploadImage(IMAGE_TEACHER, 'image_detail');
				$input['image_detail'] = $imageDetail;
				$input['status'] = ACTIVE;
				$input['hightlight'] = ACTIVE;
				$input['active'] = ACTIVE;
				CommonNormal::create($input);
				
				return Redirect::action('TeacherSetupController@index') ;
			}
		} else {
			$validator = Validator::make($input,$rules);
			if($validator->fails()) {
				return Redirect::action('TeacherSetupController@edit', $id)
		            ->withErrors($validator);
	        } else {
	        	if($input['image']){
					$image = Common::uploadImage(IMAGE_TEACHER, 'image');
					$input['image'] = $image;
	        	}else{
	        		$input['image'] = $data->image;
	        	}
	        	if($input['image_detail']){
					$imageDetail = Common::uploadImage(IMAGE_TEACHER, 'image_detail');
					$input['image_detail'] = $imageDetail;
	        	}else{
	        		$input['image_detail'] = $data->image_detail;
	        	}
	        	$input['hightlight'] = ACTIVE;
	        	$input['active'] = ACTIVE;
	        	$check = CommonNormal::update($data->id,$input);
				return Redirect::action('TeacherSetupController@index') ;
			}
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
		return Redirect::action('TeacherSetupController@index');
	}

	public function getWeightNumber($type, $id)
	{
		$model = CommonNormal::commonName();
		CommonAdmin::putEditWeightNumber($model, $type, $id, 'teacher_id');
		
		return Redirect::back();
	}

	public function postCheckHot($id)
	{
		$field = Input::get('field');
		$data = TeacherSetup::where('teacher_id', $id)->first();
		$input[$field] = (Input::get('checked') == 'true') ? ACTIVE : 0 ;
		// dd($input[$field] . '-' .$id);
		if($data){
			// CommonNormal::update($data->id,$input);
			$data->update(['hightlight' => $input[$field]]);
			$response['status'] = true;
			$response['message'] = 'Thành công';
			return Response::json($response);
		} else {
			// $input['course_id'] = $id;
			// $id = CommonNormal::create($input);
			$response['status'] = true;
			$response['message'] = 'Không có dữ liệu';
			return Response::json($response);
		}
		
	}
	public function search()
	{
		$input = Input::except('page');
		$data = CommonSite::commonQuery();
		$data = $data->where('giaovien.listvisible', 0)
			->where('subject.id', $input['subject'])
			->select('giaovien.id as id', 'giaovien.hoten as hoten', 
				'teacher.weight_number as weight_number',
				'teacher.hightlight as hightlight', 'teacher.active as active'
				)
			->groupBy('giaovien.id')
			->paginate(PAGINATE);
		return View::make('admin.teacher.index')->with(compact('data'));
	}

}

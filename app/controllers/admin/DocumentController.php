<?php

class DocumentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Documents::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.document.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate($teacherId)
	{
		return View::make('admin.document.create-detail')->with(compact('teacherId'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.document.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'required',
		);
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'teacher_id');
		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::action('DocumentController@create')
	            ->withErrors($validator);
        } else {        
        	$image = Common::uploadImage(IMAGEDOCUMENT, 'image_url');
			$input['image_url'] = $image;
			// dd('sai truoc khi upload file');
			$files = Common::uploadImage(FILEDOCUMENT, 'files');
			$input['files'] = $files;
			$input['status'] = ACTIVE;
			$documentId = CommonNormal::create($input);
			if (!$documentId) {
				dd($input);
			}
			$document = Documents::find($documentId);
			if (isset($inputAll['teacher_id'])) {
				$document->teachers()->attach(['teacher_id' => $inputAll['teacher_id'][0], 'document_id' => $documentId]);
			}
			if (count($inputAll['teacher_id']) < 2) {
				return Redirect::action('DocumentController@getDocumentByTeacher', array($inputAll['teacher_id'][0])) ;
			}
			return Redirect::action('DocumentController@index') ;
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
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Documents::with('teachers')->find($id);
		$data->teachers = RelationTeacherDocument::where('document_id', $id)->lists('teacher_id');
		return View::make('admin.document.edit')->with(compact('data'));
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
			'name'   => 'required',
		);

		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'teacher_id');
		$data = Documents::find($id);
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('DocumentController@edit', $id)
	            ->withErrors($validator);
        } else {
        	if($input['image_url']){
				$image = Common::uploadImage(IMAGEDOCUMENT, 'image_url');
				$input['image_url'] = $image;
        	}else{
        		$input['image_url'] = $data->image_url;
        	}
        	if($input['files']){
				$files = Common::uploadImage(FILEDOCUMENT, 'files');
				$input['files'] = $files;
        	}else{
        		$input['files'] = $data->files;
        	}
        	$check = CommonNormal::update($id,$input);
        	if (!$check) {
        		dd($input);
        	}
			$checkUpdate = Common::syncRelation('Documents', $id, 'documentTeacher', $inputAll, 'teacher_id');
			if (!$checkUpdate) {
				dd('lỗi' . $inputAll);
			}
			return Redirect::action('DocumentController@getDocumentByTeacher', $inputAll['teacher_id'][0]) ;
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
		$teachers = RelationTeacherDocument::where('document_id', $id)->lists('teacher_id');
		Common::detachRelation('Documents', $id, 'documentTeacher');
		CommonNormal::delete($id);
		return Redirect::action('DocumentController@getDocumentByTeacher', $teachers[0]) ;
		// return Redirect::action('DocumentController@index');
	}

	public function getDocumentByTeacher($teacherId)
	{
		$arrDocument = RelationTeacherDocument::where('teacher_id', $teacherId)->lists('document_id');
		$data = Documents::whereIn('id', $arrDocument)->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.document.index')->with(compact('data', 'teacherId'));
	}

}

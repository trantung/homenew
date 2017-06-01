<?php

class SlideController extends AdminController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList($typeSlide = null)
	{
		$listBlock = [];
		$listMenu = [];
		$listClass = [];
		$listNews = [];
		if (!$typeSlide) {
			$typeSlide = TYPE_SLIDE_FULL;
			$listBlock = Blocks::where('id', '!=', 1)->with('slidesFull')->orderBy('id', 'desc')->get();
			$listMenu = Menus::where('link', '')->with('slidesFull')->orderBy('id', 'desc')->get();
			$listClass = HomeClass::with('slidesFull')->orderBy('id', 'desc')->get();
		}
		if ($typeSlide == TYPE_SLIDE_STUDENT) {
			$listBlock = Blocks::with('slidesStudent')->orderBy('id', 'desc')->get();
			$listMenu = Menus::where('link', '')->with('slidesStudent')->orderBy('id', 'desc')->get();
			$listClass = HomeClass::with('slidesStudent')->orderBy('id', 'desc')->get();
		}
		if ($typeSlide == TYPE_SLIDE_ROW) {
			// $listBlock = Blocks::with('slidesRow')->find(THCS_BLOCK);
			$listBlock = Slide::where('block_id', THCS_BLOCK)->where('display_type', TYPE_SLIDE_ROW)->get();
			$listNews = Slide::where('block_id', SLIDE_HOME)->where('display_type', TYPE_SLIDE_ROW)->get();
			$listMenu = Menus::where('link', '')->with('slidesRow')->orderBy('id', 'desc')->get();
		}
		$data = Slide::orderBy('id', 'desc')->paginate(PAGINATE);
		
		return View::make('admin.slide.index')->with(compact('data', 'listBlock', 'listMenu', 'listClass', 'listNews'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.slide.create');
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
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'class_id', 'menu_id', 'type_config');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			if ($inputAll['type_config'] == TYPE_SLIDE_CLASS) {
				$modelId = $inputAll['class_id'][0];
			}
			if ($inputAll['type_config'] == TYPE_SLIDE_BLOCK) {
				$modelId = $inputAll['block_id'];
			}
			if ($inputAll['type_config'] == TYPE_SLIDE_MENU) {
				$modelId = $inputAll['menu_id'][0];
			}
			return Redirect::action('SlideController@getCreateSlide', array($input['display_type'], $inputAll['type_config'], $modelId))
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	$input['image_url'] = getNameImageUpload($input, IMAGESLIDE, 'image_url');
        	$input['image_url_mobile'] = getNameImageUpload($input, IMAGESLIDE_MOBILE, 'image_url_mobile');
			// $image = Common::uploadImage(IMAGESLIDE, 'image_url');
			// $imageMobile = Common::uploadImage(IMAGESLIDE_MOBILE, 'image_url_mobile');
			// $input['image_url'] = $image;
			// $input['image_url_mobile'] = $imageMobile;
			$slideId = CommonNormal::create($input);
			$slide = SLide::find($slideId);
			if (isset($inputAll['class_id'])) {
				$slide->hasClass()->attach(['class_id' => $inputAll['class_id'][0], 'slide_id' => $slideId]);
			}
			if (isset($inputAll['menu_id'])) {
				$slide->hasMenu()->attach(['menu_id' => $inputAll['menu_id'][0], 'slide_id' => $slideId]);
			}
			if ($input['display_type'] == TYPE_SLIDE_FULL) {
				$input['display_type'] = null;
			}
			return Redirect::action('SlideController@getList', array($input['display_type'])) ;
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
		$data = Slide::find($id);
		return View::make('admin.slide.edit')->with(compact('data'));
	}

	public function getEdit($id, $typeSlide, $typeConfig, $modelId = null)
	{
		$data = Slide::find($id);
		if ($typeConfig == TYPE_SLIDE_CLASS) {
			$data->class_id = $modelId;
		}
		if ($typeConfig == TYPE_SLIDE_BLOCK) {
			$data->block_id = $modelId;
		}
		if ($typeConfig == TYPE_SLIDE_MENU) {
			$data->menu_id = $modelId;
		}
		return View::make('admin.slide.edit-detail')->with(compact('data', 'modelId', 'typeConfig', 'typeSlide'));
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
			'name'   => 'required'
		);
		$data= Slide::find($id);
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'class_id', 'menu_id', 'type_config');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			if ($inputAll['type_config'] == TYPE_SLIDE_CLASS) {
				$modelId = $inputAll['class_id'][0];
			}
			if ($inputAll['type_config'] == TYPE_SLIDE_BLOCK) {
				$modelId = $inputAll['block_id'];
			}
			if ($inputAll['type_config'] == TYPE_SLIDE_MENU) {
				$modelId = $inputAll['menu_id'][0];
			}
			return Redirect::action('SlideController@getEdit',[$id, $input['display_type'], $inputAll['type_config'], $modelId] )
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	if (isset($input['image_url'])) {
        		$input['image_url'] = getNameImageUpload($input, IMAGESLIDE, 'image_url');
        	}
        	else {
        		$input['image_url'] = $data->image_url;
        	}
        	if (isset($input['image_url_mobile'])) {
        		$input['image_url_mobile'] = getNameImageUpload($input, IMAGESLIDE_MOBILE, 'image_url_mobile');
        	}
        	else {
        		$input['image_url_mobile'] = $data->image_url_mobile;
        	}
			CommonNormal::update($id,$input);
			Common::syncRelation('Slide', $id, 'hasClass', $inputAll, 'class_id');
			Common::syncRelation('Slide', $id, 'hasMenu', $inputAll, 'menu_id');
		}
		if ($input['display_type'] == TYPE_SLIDE_FULL) {
			$input['display_type'] = null;
		}
		return Redirect::action('SlideController@getList', array($input['display_type'])) ;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::detachRelation('Slide', $id, 'hasMenu');
		Common::detachRelation('Slide', $id, 'hasClass');
		CommonNormal::delete($id);
		return Redirect::back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreateSlide($typeSlide, $typeConfig, $modelId = null)
	{
		return View::make('admin.slide.create-detail')->with(compact('modelId', 'typeConfig', 'typeSlide'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getConfigBlock($modelId)
	{
		$typeConfig = TYPE_SLIDE_BLOCK;
		return View::make('admin.slide.config.create')->with(compact('modelId', 'typeConfig'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getConfigMenu($modelId, $configTitle = null)
	{
		if (!$configTitle) {
			$configTitle = '';
		}
		$typeConfig = TYPE_SLIDE_MENU;
		return View::make('admin.slide.config.create')->with(compact('modelId', 'typeConfig', 'configTitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postConfig()
	{
		$inputAll = Input::except('_token');
		$deleteOld = SlideConfig::where('model_name', $inputAll['model_name'])->where('model_id', $inputAll['model_id']);
		if (isset($inputAll['title'])) {
			$deleteOld = $deleteOld->whereNotNull('title');
		} else {
			$deleteOld = $deleteOld->whereNull('title');
		}
		$deleteOld = $deleteOld->delete();
		SlideConfig::create($inputAll);
		if (isset($inputAll['title'])) {
			return Redirect::action('SlideController@getList' , TYPE_SLIDE_ROW) ;
		}
		return Redirect::action('SlideController@getList') ;
	}

	public function getWeightNumber($type, $id)
	{
		$model = CommonNormal::commonName();
		CommonAdmin::putEditWeightNumber($model, $type, $id, 'id');
		
		return Redirect::back();
	}
}

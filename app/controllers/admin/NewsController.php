<?php

class NewsController extends AdminController {

	const MENU_ID         = 'menu_id';
	const BLOCK_ID        = 'block_id';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data = News::orderBy('id', 'desc')->paginate(PAGINATE);
		$blockId = checkPermissionBlock();
		return View::make('admin.news.index')->with(compact('data', 'blockId'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$blockId = checkPermissionBlock();
		return View::make('admin.news.create')->with(compact('blockId'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$rules = array(
			'name'   => 'required',
		);
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'type_new_id', 'block_id', 'menu_id', 'weight_number_block', 'weight_number_menu');
		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::action('NewsController@create')
	            ->withErrors($validator);
        } else {        
        	if (isset($input['logo'])) {
        		$input['logo'] = getNameImageUpload($input, IMAGENEWS, 'logo');
        	}
        	else {
        		$input['logo'] = $data->logo;
        	}
        	if (isset($input['logo_mobile'])) {
        		$input['logo_mobile'] = getNameImageUpload($input, IMAGENEWS_MOBILE, 'logo_mobile');
        	}
        	else {
        		$input['logo_mobile'] = $data->logo_mobile;
        	}
			$newId = CommonNormal::create($input);
			//begin
			if (isset($inputAll['type_news'])) {
				foreach ($inputAll['type_news'] as $key => $value) {
					if (isset($value['type_new_id'])) {
						Common::attachRelation('News', $newId, 'typeNews', $value, 'type_new_id', WEIGHT_NUMBER);
					}
					
				}
			}
			if (isset($inputAll['menu'])) {
				foreach ($inputAll['menu'] as $key => $value) {
					if (isset($value['menu_id'])) {
						Common::attachRelation('News', $newId, 'hasMenu', $value, 'menu_id', WEIGHT_NUMBER);
					}
					
				}
			}
			if (isset($inputAll['block'])) {
				foreach ($inputAll['block'] as $key => $value) {
					if (isset($value['block_id'])) {
						Common::attachRelation('News', $newId, 'hasBlock', $value, 'block_id', WEIGHT_NUMBER);
					}
				}
			}
			return Redirect::action('NewsController@getIndex') ;
		}
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$blockId = checkPermissionBlock();
		$data = News::find($id);
		return View::make('admin.news.edit')->with(compact('data', 'blockId'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		$rules = array(
			'name'   => 'required',
		);
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'type_new_id', 'block_id', 'menu_id', 'weight_number_block', 'weight_number_menu');
		$blockId = checkPermissionBlock();
		$data = News::find($id);
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('NewsController@edit', $id)
	            ->withErrors($validator);
        } else {
        	if (isset($input['logo'])) {
        		$input['logo'] = getNameImageUpload($input, IMAGENEWS, 'logo');
        	}
        	else {
        		$input['logo'] = $data->logo;
        	}
        	if (isset($input['logo_mobile'])) {
        		$input['logo_mobile'] = getNameImageUpload($input, IMAGENEWS_MOBILE, 'logo_mobile');
        	}
        	else {
        		$input['logo_mobile'] = $data->logo_mobile;
        	}
        	CommonNormal::update($id,$input);
			Common::deleteRecordRelation('NewsMenu', 'news_id', $id);
			Common::deleteRecordRelation('NewsBlock', 'news_id', $id);
			Common::deleteRecordRelation('RelationNewType', 'new_id', $id);
        	if (isset($inputAll['type_news'])) {
				Common::syncRelationParams('RelationNewType', ['new_id' => $id], $inputAll['type_news'], 'type_new_id');
        	}
        	if (isset($inputAll['menu'])) {
				Common::syncRelationParams('NewsMenu', ['news_id' => $id], $inputAll['menu'], 'menu_id');
        	}
        	if (isset($inputAll['block'])) {
				Common::syncRelationParams('NewsBlock', ['news_id' => $id], $inputAll['block'], 'block_id');
        	}
			return Redirect::action('NewsController@getIndex') ;
		}
	}
	public function postDestroy($id)
	{
		Common::detachRelation('News', $id, 'typeNews');
		Common::detachRelation('News', $id, 'hasMenu');
		Common::detachRelation('News', $id, 'hasBlock');
		CommonNormal::delete($id);
		return Redirect::action('NewsController@getIndex');
	}
	public function postDestroyNewHome($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('NewsController@getIndex');
	}
	
}

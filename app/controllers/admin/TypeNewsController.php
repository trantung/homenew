<?php

class TypeNewsController extends AdminController {

	const TYPE_NEWS_ID    = 'type_news_id';
	const MENU_ID         = 'menu_id';
	const WEIGHT_NUMBER   = 'weight_number';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TypeNews::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.typenew.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.typenew.create');
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
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('TypeNewsController@create')
	            ->withErrors($validator);
        } else {

			$typeNewId = CommonNormal::create($inputAll);
			if (isset($inputAll['menu'])) {
				foreach ($inputAll['menu'] as $key => $value) {
					if (isset($value['menu_id'])) {
						Common::attachRelation('TypeNews', $typeNewId, 'hasMenu', $value, 'menu_id', WEIGHT_NUMBER);
					}
					
				}
			}
			if (isset($inputAll['block'])) {
				foreach ($inputAll['block'] as $key => $value) {
					if (isset($value['block_id'])) {
						Common::attachRelation('TypeNews', $typeNewId, 'hasBlock', $value, 'block_id', WEIGHT_NUMBER);
					}
				}
			}
			return Redirect::action('TypeNewsController@index') ;
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
		$data = TypeNews::find($id);
		$arrMenu = TypeNewsMenu::where(self::TYPE_NEWS_ID, $id)->lists(self::WEIGHT_NUMBER, self::MENU_ID);
		$allMenu = Menus::all();
		return View::make('admin.typenew.edit')->with(compact('data', 'allMenu'));
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
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'menu_id', 'weight_number');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('TypeNewsController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			CommonNormal::update($id,$input);
			Common::deleteRecordRelation('TypeNewsMenu', 'type_news_id', $id);
			Common::deleteRecordRelation('BlockTypeNew', 'type_new_id', $id);
			// Common::syncRelation('TypeNews', $id, 'hasMenu', $inputAll, 'menu_id', 'weight_number');
			if (isset($inputAll['menu'])) {
				Common::syncRelationParams('TypeNewsMenu', ['type_news_id' => $id], $inputAll['menu'], 'menu_id');
        	}
        	if (isset($inputAll['block'])) {
				Common::syncRelationParams('BlockTypeNew', ['type_new_id' => $id], $inputAll['block'], 'block_id');
        	}
			return Redirect::action('TypeNewsController@index') ;
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
		Common::detachRelation('TypeNews', $id, 'hasMenu');
		CommonNormal::delete($id);
		return Redirect::action('TypeNewsController@index');
	}


}

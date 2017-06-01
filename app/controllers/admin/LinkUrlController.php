<?php

class LinkUrlController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = LinkUrls::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.linkurl.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.linkurl.create');
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
			return Redirect::action('LinkUrlController@create')
	            ->withErrors($validator);
        } else {
        	$logo = Common::uploadImage(IMAGELINKURL, 'logo');
			$input['logo'] = $logo;
			$logo_hover = Common::uploadImage(IMAGELINKURL, 'logo_hover');
			$input['logo_hover'] = $logo_hover;
			$input['status'] = ACTIVE;
			CommonNormal::create($input);
			return Redirect::action('LinkUrlController@index') ;
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
		$data = LinkUrls::find($id);
		return View::make('admin.linkurl.edit')->with(compact('data'));
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
		$data = LinkUrls::find($id);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('LinkUrlController@edit', $id)
	            ->withErrors($validator);
        } else {
        	if($input['logo']){
        		$logo = Common::uploadImage(IMAGELINKURL, 'logo');
				$input['logo'] = $logo;
        	}else{
        		$input['logo'] = $data->logo;
        	}if ($input['logo_hover']) {
        		$logo_hover = Common::uploadImage(IMAGELINKURL, 'logo_hover');
				$input['logo_hover'] = $logo_hover;
        	}else{
        		$input['logo_hover'] = $data->logo_hover;
        	}
			CommonNormal::update($id,$input);
			return Redirect::action('LinkUrlController@index') ;
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
		return Redirect::action('LinkUrlController@index');
	}


}

<?php

class BannerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = [];
		$input = Input::except('page');
		$input = CommonAdmin::processDataFilter($input);
		$listData = Banners::where($input)->orderBy('id', 'desc')->paginate(PAGINATE);
		foreach ($listData as $key => $value) {
			// $data[$value['model_name']][$value['model_id']][$key] = new stdClass();
			// $data[$value['model_name']][$value['model_id']][$key] = $value;
			$data[$value->model_name][$value->model_id][$key] = new stdClass();
			$data[$value->model_name][$value->model_id][$key] = $value;
		}
		// dd($data);
		// $data = Banners::groupBy('model_name')->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.banner.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.banner.create-detail');
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
		// dd($input);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BannerController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			$image = Common::uploadImage(IMAGEBANNER, 'image_url');
			$input['image_url'] = $image;
			$imageMobile = Common::uploadImage(IMAGEBANNER, 'image_url_mobile');
			$input['image_url_mobile'] = $imageMobile;
			$input['status'] = ACTIVE;
			self::setAllDeactive();
			$id = CommonNormal::create($input);
			return Redirect::action('BannerController@index') ;
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
		$data = Banners::find($id);
		return View::make('admin.banner.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = Banners::find($id);
		$rules = array(
			'name'   => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('BannerController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	if($input['image_url']){
				$image = Common::uploadImage(IMAGEBANNER, 'image_url');
				$input['image_url'] = $image;
				$imageMobile = Common::uploadImage(IMAGEBANNER, 'image_url_mobile');
				$input['image_url_mobile'] = $imageMobile;
        	}else{
        		$input['image_url'] = $data->image_url;
        		$input['image_url_mobile'] = $data->image_url_mobile;
        	}
        	$input['expire_time'] = (isset($input['expire_time'])) ? $input['expire_time'] : 0 ;
        	$input['status'] = ACTIVE;
        	self::setAllDeactive();
        	CommonNormal::update($id,$input);
			return Redirect::action('BannerController@index') ;
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
		return Redirect::action('BannerController@index');
	}

	public function setAllDeactive()
	{
		Banners::where('status', ACTIVE)->update(['status' => DEACTIVE]);
	}

}

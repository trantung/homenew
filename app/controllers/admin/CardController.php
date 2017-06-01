<?php

use Carbon\Carbon;

class CardController extends CardAdminController {

	public function index()
	{
		$input = Input::except('page');
		$model = new Card();
		if (isset($input['time_active']) && $input['time_active'] != '') {
			$start = strtotime($input['time_active']);
			$end = $start + 86400;
			$model = $model->whereBetween('time_active', array($start, $end));
		}
		$input = self::processData($input);
		if (count($input) > 0) {
			$model = $model->where($input);
		}
		$checkPermission = CardAdmin::isAdmin();
		if (!$checkPermission) {
			$model = $model->where('admin_id', Auth::member()->get()->id);
		}
		$data = $model->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.card.index')->with(compact('data'));
	}

	function processData($input = array())
	{
		if (count($input) > 0) {
			foreach ($input as $key => $value) {
				if ($value == '' || $value == VALUE_SELECT_ALL || $key = 'time_active') {
					unset($input[$key]);
				}
			}
		}
		return $input;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.card.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputAll = Input::except('_token');
		$rules = array(
			'code'   => 'required|unique:mdl_card_user|numeric|digits_between:8,13',
			'password' => 'required|min:6|confirmed',
        	'password_confirmation' => 'required|min:6',
        	'trial_day' => 'numeric|min:1'
		);
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('CardController@create')
	            ->withErrors($validator);
        } else {
        	CommonNormal::create($inputAll);
        }
		return Redirect::action('CardController@index') ;
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
		$data = Card::find($id);
		return View::make('admin.card.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Input::get('password') != '') {
			$inputAll = Input::except('_token');
			$rules = array(
				'code'   => 'required|numeric|digits_between:8,13|unique:mdl_card_user,code,'.$id,
				'password' => 'required|min:6|confirmed',
    			'password_confirmation' => 'required|min:6',
	        	'trial_day' => 'numeric|min:1'
			);
		} else {
			$inputAll = Input::except('_token', 'password');
			$rules = array(
				'code'   => 'required|numeric|digits_between:8,13|unique:mdl_card_user,code,'.$id,
	        	'trial_day' => 'numeric|min:1'
			);
		}
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('CardController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	CommonNormal::update($id,$inputAll);
        }
		return Redirect::action('CardController@index') ;
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
		return Redirect::action('CardController@index');
	}

	public function getViewCourse($id)
	{
		$data = Card::find($id);
		return View::make('admin.card.config')->with(compact('data'));
	}

	public function putCourse($id)
	{
		$inputAll = Input::except('_token', '_method', 'class_id');
		Common::attachRelation('Card', $id, 'hasCourse', $inputAll, 'course_id');
		return Redirect::action('CardController@index') ;
	}


	public function putUpdateCourse($id)
	{
		$inputAll = Input::except('_token', '_method', 'class_id');
		Common::syncRelation('Card', $id, 'hasCourse', $inputAll, 'course_id');
		return Redirect::action('CardController@index') ;
	}

	public function getCourse($classId, $cardId = null)
	{
		$listCourse = CommonSite::getCourseByClass($classId);
		return View::make('admin.card.inc.course')->with(compact('listCourse', 'classId', 'cardId'));
	}

	public function getViewUpdateCourse($id)
	{
		$data = Card::find($id);
		$arrCourse = CardCourse::card($id)->lists('course_id');
		$listClass = Course::whereIn('id', $arrCourse)->lists('id', 'class_id');
		return View::make('admin.card.update-config')->with(compact('data', 'listClass'));
	}

	public function postSell($id)
	{
		$obj = Card::find($id);
		if ($obj) {
			$obj->update(['sell' => ACTIVE]);
		}
		return Redirect::action('CardController@index') ;
	}

}

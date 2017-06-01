<?php

class LogAdminActionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = LogAdminAction::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.log_admin_action.index')->with(compact('data'));
	}
	public function show($id)
	{
		$data = LogAdminAction::find($id);
		return View::make('admin.log_admin_action.show')->with(compact('data'));
	}
	public function destroy($id)
	{
		LogAdminAction::find($id)->delete();
		return Redirect::action('LogAdminActionController@index');
	}


}

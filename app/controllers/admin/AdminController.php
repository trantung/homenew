<?php 

class AdminController extends BaseController {

	public function __construct() 
	{
		// $this->beforeFilter('hocmailogin', array('except'=>array('login', 'doLogin')));
		$this->beforeFilter('@hocmaiLogin');
		global $CFG;
		global $USER;
		$this->cfg = $CFG;
		$this->user = $USER;
		$permissionBlock = checkPermissionBlock();
		View::share('USER', $this->user);
		View::share('permissionBlock', $permissionBlock);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function hocmaiLogin()
	{
        $path = 'manager/homenew/';
        if(!self::devAccount()) {
        	$check = user_access_path($permlevel, USER_PATH_ROLE_VIEW,$path);
        	if (!$check) {
				return 'no permission';
			}
        }
		
	}
	public function index() 
	{
		return View::make('admin.dashboard');
	}

	public function devAccount()
	{
		$user = $this->user;
		if (in_array($user->username, self::getArrayDev()) ) {
			return true;
		}
		return false;
	}
	public function getArrayDev()
	{
		return ['hocmai.kithuat', 'tungtt2@hocmai.vn', 'haind@hocmai.vn', 'test@hocmai.vn'];
	}
}
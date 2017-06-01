<?php

namespace Frontend;
class TeacherController extends FrontController {
    public function __construct()
    {
        //$this->beforeFilter('admin', array('except'=>array('login', 'doLogin')));
        parent::__construct();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexTeacher($block, $class, $teacherId)
	{
		// $menu = \Menus::where('class_id', $class)->orderBy('weight_number', 'asc')
  //           ->where('status', ACTIVE)->get();
        $menu = \CommonSite::getMenuByBlock($block, $class);
        $blockDetail = \Blocks::find($block);
        $classList = \HomeClass::where('block_id', $block)->orderBy('weight_number', 'asc')->get();
        $teacher = \Teacher::find($teacherId);
        $teacher->info = \TeacherSetup::where('teacher_id', $teacherId)->first();
        $blockName = 'giao-vien';
        $className = '';
		return \View::make('frontend.home.teacher')->with(compact('block', 'teacherId', 'classList', 'class',
		 'menu', 'blockDetail', 'teacher', 'blockName', 'className'));
	}

}

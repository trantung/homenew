<?php
use Carbon\Carbon;

class CommonNormal
{
	public static function getGlobal() 
	{
		global $USER;
		return $USER;
	}
	public static function getInputLogAdminAction($id, $action)
	{
		$input = [
			'model_name' => self::commonName(),
			'model_id' => $id,
			'action' => $action,
			'by_user' => self::getGlobal()->id,
		];
		return $input;
	}
	public static function saveActionAdmin($id, $action)
	{
		$logInput = self::getInputLogAdminAction($id, $action);
		LogAdminAction::create($logInput);
	}
	public static function delete($id)
	{
		$name = self::commonName();
		self::saveActionAdmin($id, DELETE_ACTION);
		$name::find($id)->delete();
	}

	public static function update($id, $input, $modelName = NULL)
	{
		$name = self::commonName();
		if($modelName) {
			$name = $modelName;
		}
		self::saveActionAdmin($id, EDIT_ACTION);
		return $name::find($id)->update($input);
	}

	public static function create($input, $name = NULL)
	{
		$name = self::commonName($name);
		$id = $name::create($input)->id;
		self::saveActionAdmin($id, CREATE_ACTION);
		return $id;
	}
	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == 'slide') {
			return 'Slide';
		}
		if ($name == 'banner') {
			return 'Banners';
		}
		if($name == 'block'){
			return 'Blocks';
		}
		if($name == 'class'){
			return 'HomeClass';
		}
		if($name == 'menu'){
			return 'Menus';
		}
		if($name == 'linkurl'){
			return 'LinkUrls';
		}
		if($name == 'typenew'){
			return 'TypeNews';
		}
		if($name == 'config'){
			return 'HomeConfig';
		}
		if($name == 'subjectteacher'){
			return 'CourseTeacherManagerFree';
		}
		if($name == 'course'){
			return 'HomenewCourse';
		}
		if($name == 'news'){
			return 'News';
		}
		if($name == 'document'){
			return 'Documents';
		}
		if($name == 'card'){
			return 'Card';
		}
		if($name == 'admin'){
			return 'CardAdmin';
		}
		if($name == 'program'){
			return 'Program';
		}
		if($name == 'teacher-setup'){
			return 'TeacherSetup';
		}
		return $name;
	}

}
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/card/debug', function(){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$input = ['username' => 'tungtt2@hocmai.vn', 'password' => '123456'];
	$checkLogin = Auth::member()->attempt($input);
	dd($checkLogin);
});

Route::group(['prefix' => 'admin_card'], function () {
{
	Route::get('/login', array('uses' => 'CardAdminController@login', 'as' => 'admin.layout.login'));
	Route::post('/login', array('uses' => 'CardAdminController@doLogin'));
	Route::get('/logout', array('uses' => 'CardAdminController@logout', 'as' => 'admin.layout.logout'));
	Route::resource('/card', 'CardController');
	Route::controller('/card', 'CardController');
	Route::controller('/auth', 'AuthCardController');
	Route::resource('/admin', 'CardAdminController');
}
});
Route::resource('/homenew/permission/user', 'PermissionUserController');

Route::group(['prefix' => 'admin'], function () {
{
	Route::get('/slide/debug', function(){
		$block = Blocks::find(4);
		$block->update(['status' => 2]);
		dd($block);
	});
	Route::get('/banner/alter', function(){
		$block = Banners::where('model_name','')->update(['model_name' => 'Banners']);
		dd('done');
	});
	
	Route::resource('/', 'AdminController');
	Route::resource('/slide', 'SlideController', array('except' => array('show')));
	Route::controller('/slide', 'SlideController');
	Route::resource('/banner', 'BannerController');
	Route::resource('/block', 'AdminBlockController');
	Route::resource('/class', 'ClassController');
	Route::resource('/menu', 'MenuController');
	Route::resource('/linkurl', 'LinkUrlController');
	Route::resource('/typenew', 'TypeNewsController');
	Route::resource('/config', 'ConfigController');
	// Route::resource('/news', 'NewsController');
	Route::controller('/news', 'NewsController');
	Route::resource('/log_admin_action', 'LogAdminActionController');
	Route::resource('/program', 'ProgramController');

	Route::get('/teacher-setup/search', 'TeacherSetupController@search');
	Route::resource('/teacher-setup', 'TeacherSetupController');
	Route::controller('/teacher-setup', 'TeacherSetupController');

	Route::get('/subjectteacher/teacher/{id}', array('uses' => 'CourseTeacherController@getTeacher'));
	Route::resource('/subjectteacher', 'CourseTeacherController');
	
	Route::get('/course/search', 'CourseManagerController@search');
	Route::resource('/course', 'CourseManagerController');
	Route::controller('/course', 'CourseManagerController');

	Route::resource('/document', 'DocumentController');
	Route::controller('/document', 'DocumentController');
	Route::get('/fix_delete_new', function(){
		$newTrashed = News::onlyTrashed()->get();
		// dd($test);
		foreach ($newTrashed as $newTrash) {
			Common::deleteRecordRelation('NewsMenu', 'news_id', $newTrash->id);
			Common::deleteRecordRelation('NewsBlock', 'news_id', $newTrash->id);
			Common::deleteRecordRelation('RelationNewType', 'new_id', $newTrash->id);
		}
		dd(123);
	});
	// Route::resource('/card', 'CardController');
	// Route::get('/card/config-course/{classId}/card/{cardId}', 'CardController@getConfigCourse');
	// Route::controller('/card', 'CardController');
}
});
Route::resource('/', 'Frontend\HomeController');

Route::group(['prefix' => 'frontend'], function () {
    {
		Route::get('/listsubject/{teacherId}', array('uses' => 'Frontend\BlockController@getSubjectByTeacher'));
		Route::get('/listcourse/{subjectId}/{classId}/{teacherId}', array('uses' => 'Frontend\BlockController@getCourseBySubjectTeacher'));
		Route::get('/listCourseFree/{subjectId}/{classId}', array('uses' => 'Frontend\BlockController@listCourseFree'));
		Route::get('/listsubjectclass/{classId}', array('uses' => 'Frontend\BlockController@getSubjectByClass'));
		Route::get('/subject/{subjectId}/class/{classId}/menu/{menuId}', array('uses' => 'Frontend\BlockController@getCourseBySubject'));
		Route::get('/subject/{subjectId}/{class}', array('uses' => 'Frontend\BlockController@getTeacherBySubject'));
        Route::resource('/home', 'Frontend\HomeController');
        Route::resource('/block', 'Frontend\BlockController');
        Route::controller('/block', 'Frontend\BlockController');
        //Route::resource('/khoi/{block}/lop/{class}', 'Frontend\HomeController@block');
    }
});
Route::group(['prefix' => 'api'], function () {
    {
		Route::controller('/json', 'ApiController');
    }
});


Route::get('/giao-vien/{blockId}/{classId}/{teacherId}', array('uses' => 'Frontend\TeacherController@indexTeacher'));
Route::get('/{blockName}/{className}/{menuId}', array('uses' => 'Frontend\CourseController@indexCourse'));
Route::get('/{blockName}/{className}', array('uses' => 'Frontend\BlockController@blockDetail'));
Route::get('/{blockName}', array('uses' => 'Frontend\BlockController@blockDefault', 'as' => 'block.default'));




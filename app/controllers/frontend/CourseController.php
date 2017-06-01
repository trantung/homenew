<?php
/**
 * Created by Lichbt.
 * User: lichbt
 * Date: 3/9/2017
 * Time: 2:55 PM
 */

namespace Frontend;

class CourseController extends FrontController {
    public function __construct()
    {
        parent::__construct();
    }
    public function indexCourse($blockName, $className, $menuId)
    {
        // dd(rewriteUrl(\Course::find(208), 'course'));
        $block = \CommonSite::getBlockIdByName($blockName);
        $class = \CommonSite::getIdByClassName($className);
    	$slides = \CommonSite::getSlideByMenu($block, $class, $menuId, TYPE_SLIDE_FULL);
        $menu = \CommonSite::getMenuByBlock($block, $class);
        $blockDetail = \Blocks::find($block);
        $classList = \CommonSite::getClassByBlock($block);
        $currentMenu = \CommonSite::getMenuProgram($menuId);
        $introNews = \CommonSite::getIntroNewsByMenu($block, $class, $menuId, LIMIT_NEW_THPT);
        $listCourseHot = \HomenewCourse::getListCourseHot($class, $menuId, LIMIT_NEW_THPT);
        $listCourse = \HomenewCourse::getListCourse($class, $menuId);
        $slideStudents = \CommonSite::getSlideByMenu($block, $class, $menuId, TYPE_SLIDE_STUDENT);
        return \View::make('frontend.home.course')->with(compact('block', 'class', 'slides', 'menu', 
        	'blockDetail', 'classList', 'introNews', 'listCourse', 'listCourseHot', 'slideStudents', 'menuId', 'blockName', 'className', 'currentMenu'
        ));
    }
}
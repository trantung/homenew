<?php
/**
 * Created by Lichbt.
 * User: lichbt
 * Date: 3/9/2017
 * Time: 2:55 PM
 */

namespace Frontend;

class BlockController extends FrontController {
    public function __construct()
    {
        //$this->beforeFilter('admin', array('except'=>array('login', 'doLogin')));
        parent::__construct();
    }
    public function blockDetail($blockName, $className)
    {
        $CFG = $this->cfg;
        $block = \CommonSite::getBlockIdByName($blockName);
        $class = \CommonSite::getIdByClassName($className);
        $slides = \CommonSite::getSlideByClass($class, TYPE_SLIDE_FULL);
        // $slides = \Slide::where('block_id', $block)
        //     ->where('display_type', TYPE_SLIDE_FULL)
        //     ->get();
        $menu = \CommonSite::getMenuByBlock($block, $class);
        $classList = \CommonSite::getClassByBlock($block);
        $blockDetail = \Blocks::find($block);
        $typeFirst = \CommonSite::getTypeFirst($block);
        $typeLast = \CommonSite::getTypeLast($block);
        $listNewTypeFirst = \CommonSite::listNewTypeFirst($block);
        $listNewsTypeLast = \CommonSite::listNewsTypeLast($block);
        $listLink = \LinkUrls::where('block_id', $block)
            ->where('status', ACTIVE)
            ->orderBy('weight_number', 'asc')
            ->limit(PAGINATE_LIST_LINK_CHILD)->get();
        $slideStudents = \CommonSite::getSlideByClass($class, TYPE_SLIDE_STUDENT);
        $freeLearn = \CourseTeacherManagerFree::where('class_id', $class)
            ->orderBy('created_at', 'desc')->limit(LIMIT_NEW_THPT)->get();
        $listteacher = \CommonSite::getListTeacher($class, PAGINATE_SLIDE_TEACHER_SECOND);
        $listteacherSlide = \CommonSite::getListTeacher($class)->toArray();
        $listteacherSlide = array_chunk($listteacherSlide, PAGINATE_SLIDE_TEACHER_SECOND);
        $listteacherSlide_v2 = \CommonSite::getListTeacher($class);
//        $listteacherSlide_v2 = array_chunk($listteacherSlide_v2, PAGINATE_SLIDE_TEACHER_SECOND_V2);
        return \View::make('frontend.home.block')
            ->with(compact('block', 'slides', 'menu','blockName','className',
                'blockDetail', 'classList', 'class',
                'typeFirst', 'typeLast', 'listNewTypeFirst','freeLearn', 
                'listNewsTypeLast', 'listLink', 'slideStudents', 'listteacher', 'listteacherSlide', 'listteacherSlide_v2', 'CFG'
        ));
    }
    public function blockDefault($blockName)
    {

        $block = \CommonSite::getBlockIdByName($blockName);
//        var_dump($blockName); die;
        $user = $this->user; 
        $class = \CommonSite::checkClassUser($user, $block);
//        var_dump($class); die;
        if (!$class) {
            dd('admin chưa chọn mặc định lớp');
        }
        if ($block == THPT_BLOCK) {
            $className = \CommonSite::getSlugNameByClassId($class);

            return $this->blockDetail($blockName, $className);
        }
//                    var_dump($blockName); die;
        return $this->blockThcs($blockName);
    }

    public function blockThcs($blockName)
    {

        $CFG = $this->cfg;
        $block = \CommonSite::getBlockIdByName($blockName);
        $slides = \CommonSite::getSlide($block, TYPE_SLIDE_FULL);
        $block = \CommonSite::getBlockIdByName($blockName);
        $menu = \CommonSite::getMenuThcs($block);
        $classList = \CommonSite::getClassByBlock($block);
        $blockDetail = \Blocks::find($block);
        $slideStudents = \CommonSite::getSlide($block, TYPE_SLIDE_STUDENT);
        $className = '';
        return \View::make('frontend.home.block')
            ->with(compact('block', 'slides', 'menu',
                'blockDetail', 'classList',
                'typeFirst', 'typeLast', 'CFG', 'slideStudents','blockName','className'
            ));
    }

    public function homeMenu($blocks) {
        return \View::make('frontend.block.homemenu')->with(compact('blocks'));
    }

    public function menu($block) {
        return \View::make('frontend.block.menu', array('block' => $block));
    }

    public function mainSlider($block) {
        return \View::make('frontend.block.mainslider');
    }

    public function secondSlider($block) {
        return \View::make('frontend.block.secondslider');
    }

    public function review($block) {
        return \View::make('frontend.block.review' , array('block' => $block));
    }

    public function banner($block) {
        return \View::make('frontend.block.banner');
    }

    public function homeNews($block) {
        return \View::make('frontend.block.homenews');
    }

    public function homeLinks($block, $limit) {
        return \View::make('frontend.block.homelinks');
    }

    public function teachers($block, $class) {
        return \View::make('frontend.block.teachers');
    }

    public function chooseCourse($block, $class) {
        return \View::make('frontend.block.choosecourse');
    }

    public function news($block) {
        return \View::make('frontend.block.news' , array('block' => $block));
    }

    public function chooseCourseSecond($block, $class) {
        return \View::make('frontend.block.choosecoursesecond');
    }

    public function program($block) {
        return \View::make('frontend.block.program');
    }

    public function advantage($block) {
        return \View::make('frontend.block.advantage');
    }

    public function chooseCourseThird($block) {
        return \View::make('frontend.block.choosecoursethird');
    }

    public function intro($block) {
        return \View::make('frontend.block.intro');
    }

    public function listCourses($block) {
        return \View::make('frontend.block.listcourses');
    }

    public function getSubjectByTeacher($teacherId)
    {
        $listCount = \CourseTeacher::where('teacher_id', $teacherId)->lists('course_id');
        $listSubjectid = \Course::whereIn('id', $listCount)->lists('subject');
        $listSubject = \Subject::whereIn('id', $listSubjectid)->where('hocba', ACTIVE)->lists('name', 'id');
        return \Response::json($listSubject);
    }
    
    public function getCourseBySubjectTeacher($subjectId, $classId, $teacherId )
    {
        $class = $classId - 1;
        $now = time();
        $listCourse = \Course::join('mdl_course_teacher', 'mdl_course.id', '=', 'mdl_course_teacher.course_id')
            ->join('mdl_hocmai_package_course', 'mdl_course.id', '=', 'mdl_hocmai_package_course.courseid')
            ->join('mdl_hocmai_package', 'mdl_hocmai_package.id', '=', 'mdl_hocmai_package_course.packageid')
            ->join('mdl_hocmai_package_group', 'mdl_hocmai_package.groupid', '=', 'mdl_hocmai_package_group.id')
            ->where('mdl_course.subject', $subjectId)
            ->where('mdl_hocmai_package.starttime', '<=', $now)
            ->where('mdl_hocmai_package.finishtime', '>=', $now)
            ->where('mdl_hocmai_package.stopregtime', '>=', $now)
            ->where('mdl_hocmai_package_group.time_start', '<=', $now)
            ->where('mdl_hocmai_package_group.time_end', '>=', $now)
            ->where('mdl_course_teacher.teacher_id', $teacherId)
            ->where('mdl_course.class_id', $class)
            ->select('mdl_course.fullname', 'mdl_course.id', 'mdl_hocmai_package.groupid', 'mdl_hocmai_package.id as packageid')
            ->get();
        return \Response::json($listCourse);   
    }

    public function listCourseFree($subjectId, $classId)
    {
        $freeLearn = \CommonSite::getCourseFree($subjectId, $classId);
        return \View::make('frontend.common.listcoursefree')->with(compact('freeLearn'));
    }

    public function getSubjectByClass($classId)
    {
        $class = $classId;
        $listSubject = \CommonSite::getSubjectByClass($class);
        return \Response::json($listSubject);
    }

    public static function getTeacherBySubject($subjectId, $class)
    {
        $listTeacher = \CommonSite::getTeacherBySubject($subjectId, $class);
        return \Response::json($listTeacher);
    }

    public static function getCourseBySubject($subjectId, $classId, $menuId)
    {
        $listCourse = \HomenewCourse::getListCourse($classId, $menuId, $subjectId);
        return \View::make('frontend.common.course-thcs')->with(compact('listCourse'));
    }

    public function getTrialCourseDefault($classId)
    {
        $freeLearn = \CourseTeacherManagerFree::where('class_id', $classId)
            ->orderBy('created_at', 'desc')->limit(LIMIT_NEW_THPT)->get();
        return \View::make('frontend.common.listcoursefree')->with(compact('freeLearn'));
    }
}
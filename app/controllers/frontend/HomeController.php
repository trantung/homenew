<?php
/**
 * Created by Lichbt.
 * User: lichbt
 * Date: 3/9/2017
 * Time: 2:32 PM
 */

namespace Frontend;

class HomeController extends FrontController {

    public function __construct()
    {
        //$this->beforeFilter('admin', array('except'=>array('login', 'doLogin')));
        parent::__construct();
    }


    public function index() {
        $user = $this->user;
        if (isset($user->school_class)) {
            if (!isset($user->firstLogin)) {
                $user->firstLogin = true;
                $blockName = \CommonSite::getBlockNameByClassId($user->school_class);
                return \Redirect::route('block.default', $blockName);
            }
        }
        $blocks = \CommonSite::getBlocks();
        //slide trang chu
        $slides = \CommonSite::getSlide(SLIDE_HOME, TYPE_SLIDE_FULL);
        //banner trang chu
        $banner = \Banners::where('block_id', SLIDE_HOME)->where('status', ACTIVE)->orderBy('id', 'DESC');
        //lấy tin toàn bộ ở trang chủ
        $listNews = \CommonSite::getListHomeNews();
        $newFirstHome = \CommonSite::getHomeNewsHot();
        
        $listLink = \LinkUrls::where('block_id', HOME)->where('status', ACTIVE)
            ->orderBy('weight_number', 'asc')->limit(PAGINATE_LIST_LINK_HOME)->get();
        //slide thu 2
        $slideSeconds = \CommonSite::getSlide(HOME_SLIDE, TYPE_SLIDE_ROW, 'id');
        $slideSeconds = array_chunk($slideSeconds, PAGINATE_SLIDE_SECOND);
        $test = \CommonSite::getSlide(SLIDE_HOME, TYPE_SLIDE_ROW);
        // slide review hoc sinh
        $slideStudents = \CommonSite::getSlide(SLIDE_HOME, TYPE_SLIDE_STUDENT);
        $blockName = '';
        $className = '';
        return \View::make('frontend.home.index')
            ->with(compact('blocks', 'slides', 'banner', 'listNews', 'newFirstHome', 'listLink', 'slideSeconds', 'slideStudents', 'test', 'blockName','className'));
    }

    public function getBlock($block, $class) {
        return \View::make('frontend.home.block', array('block' => $block, 'class' => $class));
    }

    public function getCourse($id) {

        // @todo replace teacher variable with model
        $teacher = new \stdClass();
        $teacher->block = 2;
        return \View::make('frontend.home.course', array('block' => $teacher->block));
    }

    public function getTeacher($id) {

        // @todo replace teacher variable with model
        $teacher = new \stdClass();
        $teacher->block = 2;
        return \View::make('frontend.home.teacher', array('block' => $teacher->block));
    }

}
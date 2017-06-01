<?php

use Illuminate\Support\Collection;

class CommonSite {

	public static function getBlockIdByName($blockName)
	{
		if ($blockName == URL_THPT) {
			return THPT_BLOCK;
		}
		if ($blockName == URL_THCS) {
			return THCS_BLOCK;
		}
		if ($blockName == URL_TH) {
			return TH_BLOCK;
		}
		return null;
	}
	public static function getSlugNameByBlockId($blockId)
	{
		if ($blockId == THPT_BLOCK) {
			return URL_THPT;
		}
		if ($blockId == THCS_BLOCK) {
			return URL_THCS;
		}
		if ($blockId == TH_BLOCK) {
			return URL_TH;
		}
		return null;

	}	
	public static function getSlugNameByClassId($classId)
	{
		if ($classId == 12) {
			return LOP_12;
		}
		if ($classId == 11) {
			return LOP_11;
		}
		if ($classId == 10) {
			return LOP_10;
		}
		if ($classId == 9) {
			return LOP_9;
		}
		if ($classId == 8) {
			return LOP_8;
		}
		if ($classId == 7) {
			return LOP_7;
		}
		if ($classId == 6) {
			return LOP_6;
		}
		if ($classId == 5) {
			return LOP_5;
		}
		if ($classId == 4) {
			return LOP_4;
		}
		if ($classId == 3) {
			return LOP_3;
		}
		if ($classId == 2) {
			return LOP_2;
		}
		if ($classId == 1) {
			return LOP_1;
		}
		return null;
	}

	public static function getIdByClassName($className)
	{
		if ($className == LOP_12) {
			return 12;
		}
		if ($className == LOP_11) {
			return 11;
		}
		if ($className == LOP_10) {
			return 10;
		}
		if ($className == LOP_9) {
			return 9;
		}
		if ($className == LOP_8) {
			return 8;
		}
		if ($className == LOP_7) {
			return 7;
		}
		if ($className == LOP_6) {
			return 6;
		}
		if ($className == LOP_5) {
			return 5;
		}
		if ($className == LOP_4) {
			return 4;
		}
		if ($className == LOP_3) {
			return 3;
		}
		if ($className == LOP_2) {
			return 2;
		}
		if ($className == LOP_1) {
			return 1;
		}
		return null;
	}
	public static function getBlockNameByClassId($classId)
	{
		$class = HomeClass::find($classId);
		$blockId = $class->block_id;
		return self::getSlugNameByBlockId($blockId);
	}


	public static function getBlockIdByClassId($classId)
	{
		$class = HomeClass::find($classId);
		$blockId = $class->block_id;
		return $blockId;
	}

	public static function getBlocks()
	{
		$blocks = \Blocks::where('status', ACTIVE)
            ->orderBy('weight_number', 'asc')
            ->get();
        return $blocks;
	}
	public static function getListType($blockId)
	{	
		$list = BlockTypeNew::where('block_id', $blockId)->lists('type_new_id');
        $listType = TypeNews::whereIn('id', $list)->orderBy('weight_number', 'asc')->get();
        return $listType;
	}
	public static function getSlide($value, $type, $field = NULL)
	{
		$slides = \Slide::where('status', ACTIVE)
			->where('block_id', $value)
			->where('display_type', $type)
            ->orderBy('weight_number', 'asc');
        if ($field) {
        	// $slides = $slides->lists($field);
        	$slides = $slides->get()->toArray();
        	return $slides;
        }
        $slides = $slides->get();
        return $slides;
	}

	public static function getSlideByClass($classId, $type, $field = NULL)
	{
		$slidesId = SlideClass::where('class_id', $classId)->lists('slide_id');
		$slides = Slide::whereIn('id', $slidesId)->where('display_type', $type)->get();
        return $slides;
	}

	public static function getSlideByMenu($block, $classId, $menuId, $type)
	{
		$slidesId = SlideMenu::where('menu_id', $menuId)->lists('slide_id');
		$slides = Slide::whereIn('id', $slidesId)->where('display_type', $type)->get();
        return $slides;
	}

	public static function getListNews($newType = NULL)
	{
		$list = BlockTypeNew::select('type_new_id')->distinct()->lists('type_new_id');
		$types = TypeNews::where('status', ACTIVE)->lists('id');
		$listTypeNew = array_diff($types, $list);
		$newsId = RelationNewType::whereIn('type_new_id', $listTypeNew)->lists('new_id');
		$news = News::whereIn('id', $newsId)
			->where('status')
			->orderBy('weight_number', 'asc');
		return $news;
	}

	public static function getType($blockId)
	{	
		$array = [];
		$listTypes = TypeNews::join('mdl_homenew_block_type_new', 'mdl_homenew_type_news.id', '=', 'mdl_homenew_block_type_new.type_new_id')
			->where('mdl_homenew_block_type_new.block_id', $blockId)
			->where('mdl_homenew_type_news.status', ACTIVE)
			->select('mdl_homenew_type_news.*', 'mdl_homenew_block_type_new.weight_number as weight_number')
			->orderBy('mdl_homenew_block_type_new.weight_number', 'asc')
			->get();
		$typeFirst = null;
		$typeLast = null;
		foreach ($listTypes as $key => $value) {
			if ($key == 0) {
				$typeFirst = $value;
			}else {
				$typeLast = $value;
			}
		}
		$array = [$typeFirst, $typeLast];
		return $array;
	}
	public static function getTypeFirst($blockId)
	{
		$type = self::getType($blockId);
		return $type[0];
	}
	public static function getTypeLast($blockId)
	{
		$type = self::getType($blockId);
		return $type[1];
	}
	public static function listNewTypeFirst($blockId)
	{
		$type = self::getTypeFirst($blockId);
		if ($type) {
			$news = self::commonQueryGetNewByType($type->id);
			return $news;
		}
		return null;
	}
	public static function listNewsTypeLast($blockId)
	{
		$type = self::getTypeLast($blockId);
		if ($type) {
			$news = self::commonQueryGetNewByType($type->id);
			return $news;
		}
		return null;
	}
	public static function commonQueryGetNewByType($typeId)
	{
		$news = News::join('mdl_homenew_relation_new_type as relation', 'relation.new_id', '=', 'mdl_homenew_news.id')
				->where('relation.type_new_id', $typeId)
				->where('status', ACTIVE)
				->select('relation.weight_number', 'mdl_homenew_news.*')
				->orderBy('relation.weight_number', 'asc')
				->orderBy('updated_at', 'desc')
				->limit(5)
				->get();
		return $news;
	}
	public static function getValueByModelField($model, $modelId, $field)
	{
		$value = $model::find($modelId);
		if ($value) {
			return $value->$field;
		}
		return null;
	}

	public static function commonQuery($courseTeacher = null)
	{
		$now = time();
		$listCourse = Course::join('mdl_course_teacher as ct', 'mdl_course.id', '=', 'ct.course_id')
			->join('mdl_giaovien as giaovien', 'giaovien.id', '=', 'ct.teacher_id')
			->join('mdl_hocmai_package_course', 'mdl_course.id', '=', 'mdl_hocmai_package_course.courseid')
			->join('mdl_hocmai_package', 'mdl_hocmai_package.id', '=', 'mdl_hocmai_package_course.packageid')
			->join('mdl_hocmai_package_group', 'mdl_hocmai_package.groupid', '=', 'mdl_hocmai_package_group.id')
			->join('mdl_subject as subject', 'mdl_course.subject', '=', 'subject.id')
			->leftJoin('mdl_homenew_teachers as teacher', 'giaovien.id', '=', 'teacher.teacher_id')
            ->where('mdl_hocmai_package.starttime', '<', $now)
            ->where('mdl_hocmai_package.finishtime', '>', $now)
			->where('mdl_course.visible', ACTIVE);
			// ->where('subject.hocba', ACTIVE);

		if ($courseTeacher) {
			$listCourse = $listCourse->where('mdl_hocmai_package_group.time_start', '<', $now)
            	->where('mdl_hocmai_package_group.time_end', '>', $now);
            return $listCourse;
		}
		return $listCourse;
	}

	public static function getListTeacher($class, $limit = NULL)
	{
		$class = $class -1;
		$listTeacher = self::commonQuery();

		$listTeacher = $listTeacher->where('mdl_course.class_id', $class)
			->where('giaovien.listvisible', '0')
			->where('teacher.hightlight', ACTIVE);
			// Course::join('mdl_course_teacher as ct', 'mdl_course.id', '=', 'ct.course_id')
			// ->join('mdl_giaovien as giaovien', 'giaovien.id', '=', 'ct.teacher_id')
			// ->join('mdl_subject as subject', 'mdl_course.subject', '=', 'subject.id')
			
			// ->where('subject.hocba', ACTIVE)
			// ->where('giaovien.listvisible', '0');
		if($limit){
			$listTeacher = $listTeacher->limit($limit);
		}
		$listTeacher = $listTeacher->groupBy('ct.teacher_id')
			->orderBy('teacher.weight_number')
			->select('giaovien.id', 'giaovien.hoten as name', 'teacher.weight_number', 'subject.name as subject_name', 'teacher.image as image')
			->get();
//        echo "<pre>";
//        dd($listCourse);
//        echo "</pre>";
//        die;

		return $listTeacher;
	}
	
	public static function getSubjectOnTeacher($teacherId)
	{
		$listCourseId = CourseTeacher::where('teacher_id', $teacherId)->lists('course_id');
		$subjectId = Course::whereIn('id', $listCourseId)->lists('subject');
		$listSubject = Subject::whereIn('id', $subjectId)->where('hocba', ACTIVE)->lists('name');
		return $listSubject;
	}

	public static function getListCourseOnTeacher($teacherId)
	{
		$now = time();
		$listCourse = self::commonQuery('courseTeacher');
		$listCourse = $listCourse->where('giaovien.id', $teacherId)
			->where('mdl_course.visible', ACTIVE)
			->select('mdl_course.fullname', 'mdl_course.summary', 'mdl_course.student', 'mdl_hocmai_package.groupid', 'mdl_hocmai_package.id as packageid')
			->get();
			// Course::join('mdl_course_teacher as ct', 'mdl_course.id', '=', 'ct.course_id')
			// ->join('mdl_giaovien as giaovien', 'giaovien.id', '=', 'ct.teacher_id')
			// ->join('mdl_hocmai_package_course', 'mdl_course.id', '=', 'mdl_hocmai_package_course.courseid')
			// ->join('mdl_hocmai_package', 'mdl_hocmai_package.id', '=', 'mdl_hocmai_package_course.packageid')
			// ->join('mdl_hocmai_package_group', 'mdl_hocmai_package.groupid', '=', 'mdl_hocmai_package_group.id')
   //          ->where('mdl_hocmai_package.starttime', '<', $now)
   //          ->where('mdl_hocmai_package.finishtime', '>', $now)
   //          ->where('mdl_hocmai_package_group.time_start', '<', $now)
   //          ->where('mdl_hocmai_package_group.time_end', '>', $now)

			// ->where('giaovien.id', $teacherId)->where('mdl_course.visible', ACTIVE)
			// ->select('mdl_course.fullname', 'mdl_course.summary', 'mdl_course.student', 'mdl_hocmai_package.groupid', 'mdl_hocmai_package.id as packageid')
			// ->get();
		return $listCourse;
	}

	public static function getNewPageChild($blockId)
	{
		$listNewId = NewsBlock::where('block_id', $blockId)
			->lists('news_id');
		$listNew = News::whereIn('id', $listNewId)->orderBy('weight_number', 'asc')->get();
		return $listNew;
	}
	public static function getSubjectByClass($class)
	{
		$class = $class - 1;
		$subject = Course::join('mdl_subject as subject', 'mdl_course.subject', '=', 'subject.id')
			->select('subject.name as subject_name', 'subject.id as subject_id')
			->where('mdl_course.class_id', $class)
			// ->where('subject.hocba', ACTIVE)
			->lists('subject_name', 'subject_id');
		return $subject;
	}
	
	public static function getMenuByBlock($blockId, $classId)
	{
		if ($blockId == THPT_BLOCK) {
			return self::getMenuByClass($classId);
		}
		return self::getMenuThcs($blockId);
	}
	public static function getMenuByClass($classId)
	{
		$menus = Menus::join('mdl_homenew_menu_class', 'mdl_homenew_menu_class.menu_id', '=', 'mdl_homenew_menu.id')
			->where('mdl_homenew_menu_class.class_id', $classId)
			->select('mdl_homenew_menu.*')
			->distinct()
			->orderBy('mdl_homenew_menu_class.weight_number', 'asc')
			->get();
		return $menus;
	}

	public static function getMenuThcs($blockId)
	{
		$menus = Menus::where('block_id', $blockId)->get();
		return $menus;
	}

	public static function getClassByBlock($blockId)
	{
		$query = self::getQueryClassByBlock($blockId);
		$class = $query->get();
		return $class;
	}
	public static function getQueryClassByBlock($blockId)
	{
		$query = HomeClass::where('block_id', $blockId)->orderBy('weight_number', 'asc');
		return $query;
	}

	public static function getActiveClassByBlock($blockId)
	{
	    $query = self::getQueryClassByBlock($blockId);
	    $classActive = $query->where('default', ACTIVE)->orderBy('id', 'asc')->first();
	    if ($classActive) {
	    	return $classActive->id;
	    }
	    return null;
	}
	public static function checkClassUser($user, $block)
	{
		if (isset($user->school_class)) {
            $classId = $user->school_class;
            if (HomeClass::find($classId)->block_id == $block) {
            	return $classId;
            }
        }
        return self::getActiveClassByBlock($block);
	}
	public static function getPackageGroupCode($classId, $teacherId){
		
	}

	public static function getCourseFree($subjectId, $classId){
		$listcourse =  CourseTeacherManagerFree::where('subject_id', $subjectId)->where('class_id', $classId)->orderBy('created_at', 'desc')->limit(COUNT_COURSE_FREE_LEARN)->get();
		return $listcourse;
	}
	public static function getDocumentByTeacher($teacherId)
	{
		$list = RelationTeacherDocument::where('teacher_id', $teacherId)->lists('document_id');
		return Documents::whereIn('id', $list)
			->orderBy('weight_number', 'asc')
			->get();
	}

	public static function getListHomeNews()
	{
		$news = News::where('is_home', ACTIVE)
			->where('is_hot', '!=', ACTIVE)
			->orderBy('weight_number', 'asc')
			->get();
		return $news;
	}
	public static function getHomeNewsHot()
	{
		$news = News::where('is_home', ACTIVE)
			->where('is_hot', '=', ACTIVE)
			->orderBy('weight_number', 'asc')
			->first();
		return $news;
	}

	public static function getNewByTypeNew($typeNewId)
	{
		$list = RelationNewType::where('type_new_id', $typeNewId)->lists('new_id');
		$listNews = News::whereIn('id', $list)
			->orderBy('updated_at', 'desc')
			->get();
		return $listNews;
	}
	
	public static function getTeacherBySubject($subjectId, $classId = null)
	{
		
        $now = time();
        $listTeacher = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
	        ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
	        ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
	        ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
	        ->join('mdl_giaovien', 'mdl_giaovien.monday', '=', 'mdl_subject.id')
	        ->where('package.starttime', '<', $now)
	        ->where('package.finishtime', '>', $now)
	        ->where('mdl_hocmai_package_group.time_start', '<', $now)
	        ->where('mdl_hocmai_package_group.time_end', '>', $now)
	        ->where('mdl_subject.id', $subjectId);
        if ($classId) {
        	$class = $classId - 1;
        	$listTeacher = $listTeacher->where('mdl_course.class_id', $class);
        }
	    $listTeacher = $listTeacher->where('mdl_course.class_id', $class)
	        ->select('mdl_giaovien.hoten as hoten', 'mdl_giaovien.id as id')
	        ->lists('hoten', 'id');
		return $listTeacher;
	}


	public static function getSlugNameByBlock($block)
	{
		$classDefault = self::getActiveClassByBlock($block);
		if (!$classDefault) {
			return false;
		}
		$slugName = self::getSlugNameByClassId($classDefault);
		if (!$slugName) {
			return false;
		}
		return $slugName;
	}

	
	public static function getCourseByClass($classId, $limit = 10)
	{
	    $now = time();
	    $classId = $classId -1;
	    $listCourse = Course::join('mdl_hocmai_package_course as packageCourse', 'mdl_course.id', '=', 'packageCourse.courseid')
	        ->join('mdl_hocmai_package as package', 'package.id', '=', 'packageCourse.packageid')
	        ->join('mdl_hocmai_package_group', 'package.groupid', '=', 'mdl_hocmai_package_group.id')
	        ->join('mdl_subject', 'mdl_course.subject', '=', 'mdl_subject.id')
	        ->where('package.starttime', '<', $now)
	        ->where('package.finishtime', '>', $now)
	        ->class($classId)
	        ->visible()
	        ->where('mdl_hocmai_package_group.time_start', '<', $now)
	        ->where('mdl_hocmai_package_group.time_end', '>', $now);
	    
	    $listCourse = $listCourse->select('mdl_course.id as course_id', 'mdl_course.fullname', 
	            'package.fee',
	            'package.finishtime', 'mdl_subject.name as subject_name',
	            'package.id as packageId', 'mdl_hocmai_package_group.id as groupId')->get();
	    return $listCourse;
	}
	
	public static function getIntroNewsByMenu($block, $class, $menuId, $limit = null)
	{
        $introNews = News::join('mdl_homenew_news_menu as news_menu', 'mdl_homenew_news.id', '=', 'news_menu.news_id')
        	->where('news_menu.menu_id', $menuId)
        	->select('mdl_homenew_news.*')
        	->orderBy('news_menu.weight_number', 'asc');
        if ($limit) {
        	$introNews = $introNews->limit($limit);
        }
        $introNews = $introNews->get();
        return $introNews;
	}

	public static function getMenuProgram($menuId)
	{
        $currentMenu = \Menus::find($menuId);
        if ($currentMenu) {
        	$currentMenu->program = \Program::where('menu_id', $menuId)->orderBy('id', 'DESC')->first();
        }
        return $currentMenu;
	}
}



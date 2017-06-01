<?php
//action
define('CREATE_ACTION', 'Tạo mới');
define('EDIT_ACTION', 'Sửa');
define('DELETE_ACTION', 'Xoá');
//trang chu
define('HOME', 0);
define('SLIDE_HOME', 4);
//phan trang list link trang chu
define('PAGINATE_LIST_LINK_HOME', 3);
//phan trang list link trang ocn
define('PAGINATE_LIST_LINK_CHILD', 6);

//phan chia so luong slide
define('PAGINATE_SLIDE_SECOND', 3);

define('PAGINATE', 20);
//active or inactive
//url slide
define('IMAGESLIDE', 'assets/image/homenew/slide/');
define('IMAGESLIDE_MOBILE', 'assets/image/homenew/slide_mobile/');
//url banner
define('IMAGEBANNER', 'assets/image/homenew/banner/');
//url block
define('IMAGEBLOCK', 'assets/image/homenew/block/');

define('IMAGELINKURL', 'assets/image/homenew/linkurl/');
// url news
define('IMAGENEWS', 'assets/image/homenew/news/');
define('IMAGENEWS_MOBILE', 'assets/image/homenew/news_mobile/');

define('IMAGECOURSETEACHER', 'assets/image/homenew/courseteacher/');

define('IMAGECOURSE', 'assets/image/homenew/course/');

define('IMAGEDOCUMENT', 'assets/image/homenew/document/');
define('IMAGE_TEACHER', 'assets/image/homenew/teacher/');
define('FILEDOCUMENT', 'assets/file/homenew/document/');

define('ACTIVE', 1);
define('DEACTIVE', 2);
define('INACTIVE', 2);
//thể loại type_new
//type_new trang chủ
define('TYPE_HOME', 1);
//type ở trang con
define('TYPE_CHILD', 2);
//vị trí hiển thị của type_new ở trang con
define('TYPE_ABOVE', 1);
define('TYPE_BELOW', 2);
//slide trang chu
define('HOME_SLIDE', 0);
//slide trang con
define('CHILD_PAGE_SLIDE', 1);
//kieu hien thi full
define('TYPE_SLIDE_FULL', 1);
define('TYPE_SLIDE_ROW', 2);
define('TYPE_SLIDE_STUDENT', 3);
//tin tức ở trang chủ
define('HOME_NEW', 0);
//fix cung blockId cho cac khoi
define('THPT_BLOCK', 1);
define('THCS_BLOCK', 2);
define('TH_BLOCK', 3);
define('HOME_BLOCK', 4);
define('SUPER_ADMIN', 0);
define('BLOCK_ERROR', 5);
//phan trang list giao vien trang con
define('PAGINATE_SLIDE_TEACHER_SECOND', 3);
define('PAGINATE_SLIDE_TEACHER_SECOND_V2', 1000);
//lay ra so luong khoa hoc mien phi
define('COUNT_COURSE_FREE_LEARN', 3);
define('WEIGHT_NUMBER', 'weight_number');
//url 
define('URL_THPT', 'trung-hoc-pho-thong');
define('URL_THCS', 'trung-hoc-co-so');
define('URL_TH', 'tieu-hoc');
//lop
define('LOP_12', 'lop-12');
define('LOP_11', 'lop-11');
define('LOP_10', 'lop-10');
define('LOP_9', 'lop-9');
define('LOP_8', 'lop-8');
define('LOP_7', 'lop-7');
define('LOP_6', 'lop-6');
define('LOP_5', 'lop-5');
define('LOP_4', 'lop-4');
define('LOP_3', 'lop-3');
define('LOP_2', 'lop-2');
define('LOP_1', 'lop-1');
//limit 
define('LIMIT_NEW_THPT', 3);
//link course
define('COURSE_REWRITE', 'course');
//course group
define('COURSE_GROUP_N2', 1);
define('COURSE_GROUP_N3', 2);
define('PAGINATE_4_STEP_SECOND', 4);
define('ONE_DAY', 86400);
define('CARD_ROLE_ADMIN', 1);
define('CARD_ROLE_MEMBER', 2);
define('VALUE_SELECT_ALL', -1);
define('TYPE_SLIDE_BLOCK', 1);
define('TYPE_SLIDE_MENU', 2);
define('TYPE_SLIDE_SUPER', 3);
define('TYPE_SLIDE_CLASS', 4);
define('UP', 1);
define('DOWN', 2);
define('DOUBLE_UP', 3);
define('DOUBLE_DOWN', 4);
//define mobile and destop
define('MOBILE', 1);
define('COMPUTER', 2);
define('BLOCK_HOME', 4);
//weight_number default
define('DEFAULT_WEIGHT_NUMBER', 0);
<?php 

class AdminImportController extends BaseController {

	public function __construct() 
	{

		// $this->beforeFilter('hocmailogin', array('except'=>array('login', 'doLogin')));
		// $this->beforeFilter('@hocmaiLogin');
		global $CFG;
		global $USER;
		$this->cfg = $CFG;
		$this->user = $USER;
		View::share('USER', $this->user);
	}

	public function index()
	{
		$data = Course::queryGetCourse()->select('mdl_course.fullname', 'mdl_course.id')->lists('fullname', 'id');
		$total = $total1 = $total2 = $total3 = 0;
		$userError = [];
		return View::make('admin.import.index')->with(compact('data', 'total', 'total1', 'total2', 'total3', 'userError'));
	}
	public function store()
	{
		$input =  Input::except('_token');
		$courseId = $input['course_id'];
		$gift_items = array(
            0 => array(
                'itemtype' => CART_ITEM_TYPE_PACKAGE_REGISTER,
                'itemid' => $courseId,
            ),
        );
        $userError = [];
        $total = $total1 = $total2 = $total3 = 0;
		// $check = Excel::load($input['file'], function($reader) use ($gift_items, $total, $total1, $total2, $total3, $userError) {
		// 	$a = $reader->get(array('name'));
		// 	// dd($usernames->toArray());
		// 	// $usernames = [
		// 	// 	'Sarrakclvin99@gmail.com',
  //  //          	'Hanhnguyenvg1104@gmail.com'
  //  //          ];
		// 	$usernames = [];
		// 	foreach ($a as $k => $v) {
		// 		// dd($value->name);
		// 		$usernames[] = $v->name;
				
		// 	}
			// dd($usernames);
       	// $gift_items = array(
        //     0 => array(
        //         'itemtype' => CART_ITEM_TYPE_PACKAGE_REGISTER,
        //         'itemid' => 199, // Ôn thi học kỳ II, toán 6
        //     ),
        // );

        $usernames = array(
            'trungloadenlu@gmail.com ,',
            'anvipboy123@gmail.com',
            'vuongdangphu2004@gmail.com',
            'nguyenlamtruong2005@gmail.com',
            'tranthanhhue2005@gmail.com',
            'tientrandat@gmail.com',
            'tranngochan05@gmail.com',
            'nguyenanhtu2005@gmail.com',
            'duckhanh2005@gmail.com',
            'minhanh2005@gmail.com',
            'nguyenleduy2005@gmail.com',
            'tuanhung2005@gmail.com ',
            'dinhngocvietanh2005@gmail.com',
            'nguyennhatminhhm@yahoo.com',
            'nguyenduthaihoc@gmail.com',
            'nguyenmanhdung@gmail.com',
            'havu722005@gmail.com',
            'tuannhan343@gmail.com',
            'quanthanh722005@gmail.com',
            'diena123321@gmail.com',
            'ngant0908@gmail.com',
            'tientho6a7555@gmail.com',
            'luulongvan218@gmail.com',
            'dcmm123a@gmail.com',
            'thanhtung731686@gmail.com',
            'bangchau.tran188@gmail.com',
            'tieuthunhagiau19@gmail.com',
            'anmngoc@gmail.com',
            'tieuthuta0909@gmail.com',
            'tiendat04022005@gmail.com',
            'nguyennguyenhongnga@gmail.com',
            'hathuloan.com@gmail.com',
            'kieutrangnguyen246@gmail.com',
            'thuylinh2005@gmail.com',
            'athd2005@gmail.com',
            'ducthinh172005@gmail.com',
            'hotboydungpro@gmail.com',
            'hientt2612@gmail.com',
            'kietletuan294@gmail.com',
            'thuyanh2005@gmail.com',
            'phutrieu6a7@gmail.com',
            'phuonganhbgt5@gmail.com',
            'thaukowil@gmail.com',
            'newaytuan@gmail.com',
            'ngockhanhnguyen2811@gmail.com',
            'budiesbudies2005@gmail.com',
            'phong.like.poki@gmail.com',
            'hoangphucdatco.ltd@gmail.com',
            'huongthao129@gmail.com',
        );
		foreach ($usernames as $key => $value) {
			$username = trim($value);
			// dd($username);
			$user = User::where('username', $username)->first();
		    if(!$user){
		        $user = User::where('email', $username)->first();
		    }
		    if($user){
		        $total3++;
		        if(cart_item_gifts($user->id, $gift_items)){
		            $total++;
		        }else{
		        	$userError[$key]['username'] = $username;
		        	$userError[$key]['error'] = 'TANG KHOA HOC LOI';
		            dump($username.' | TANG KHOA HOC LOI');
		            $total2++;
		        }
		    }else{
		        dump($username.' | KHONG CO TAI KHOAN');
		        $userError[$key]['username'] = $username;
		        $userError[$key]['error'] = 'KHONG CO TAI KHOAN';
		        $total1++;
		    }
		}

		// $data = Course::queryGetCourse()->select('mdl_course.fullname', 'mdl_course.id')->lists('fullname', 'id');

		// });
		// return View::make('admin.import.index')->with(compact('data', 'total', 'total1', 'total2', 'total3', 'userError'));

	}


}
<?php
/**
 * Created by Lichbt.
 * User: lichbt
 * Date: 3/9/2017
 * Time: 2:21 PM
 */


namespace Frontend;

class FrontController extends \BaseController {


    public function __construct()
    {

        //$this->beforeFilter('admin', array('except'=>array('login', 'doLogin')));
        global $CFG, $USER;
        $this->cfg = $CFG;
        $this->user = $USER;
        $v = '1.2.14';

        //@todo get user login
        \View::share('v',$v);
        \View::share('user',$USER);
    } 
    public function index()
    {
        return View::make('admin.layout.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
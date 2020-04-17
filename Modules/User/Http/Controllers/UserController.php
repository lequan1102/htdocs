<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        return view('user::index');
    }

    public function create()
    {
        return view('user::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('user::show');
    }


    public function edit($id)
    {
        return view('user::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

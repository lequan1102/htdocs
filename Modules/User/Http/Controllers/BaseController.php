<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    private function check_role()
    {

    }
}

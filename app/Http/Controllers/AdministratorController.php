<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;

class AdministratorController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('administrator');
    }

    public function users(){
        $users = Users::paginate('10');
        return view('users', compact('users'));
    }


}

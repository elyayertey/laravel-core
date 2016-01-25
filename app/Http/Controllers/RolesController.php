<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Http\Requests\RolesRequest;
use App\Http\Requests\StatusRequest;
use Input;

class RolesController extends Controller
{
    //
    public function index(){
        $roles = Roles::all();
        return view('roles', compact('roles'));
}

    public function save(RolesRequest $requests){
        Roles::create($requests->all());
        return redirect('users/roles')->with('message', $requests->name.' successfully created.');
    }


    public function delete(StatusRequest $requests){
        $roles = Roles::findOrFail($requests->input('id'));
        $roles->delete();

    }
}

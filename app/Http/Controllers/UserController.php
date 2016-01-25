<?php

namespace App\Http\Controllers;

use App\Settings;
use Request;
use App\Http\Requests;
use App\Http\Requests\SettingsRequest;
use App\Http\Requests\StatusRequest;
use App\Http\Controllers\Controller;
use App\Users;
use Input;
use App\Roles;

class UserController extends Controller
{
    private $id;
    private $user;


    function __construct()
    {
        $this->middleware('auth');

        $this->id = Request::segment(3);
        $this->user= Users::find($this->id);
    }

    //
    public function edit(){

        $user = $this->user;
        $roles = Roles::lists('name','id')->toArray();
    return view('edituser', compact('user', 'roles'));

}

  public function save(SettingsRequest $requests){
      $id= $requests->input('id');
      $user = Users::findOrFail($id);


      $user->name = $requests->input('name');
      $user->firstname = $requests->input('firstname');
      $user->email = $requests->input('email');
      $user->phone = $requests->input('phone');
      $user->gender = $requests->input('gender');
      $user->bio = $requests->input('bio');
      $user->country = $requests->input('country');
      $user->city = $requests->input('city');
      $user->state = $requests->input('state');
      $user->street = $requests->input('street');
      $user->zip = $requests->input('zip');
      $user->user_level = $requests->input('user_level');
      $user->save();
      $users = Users::all();
      return redirect('users')->with(compact('users'));

  }

    public function status(StatusRequest $requests){
        if(Request::ajax()) {
           $action =  $requests->input('action');
            if($action=='delete') {
                $user = Users::find($requests->input('id'));
                $user->delete();
            }

            if(!empty($action)) {
                $user = Users::find($requests->input('id'));
                if($user->is_active=='blocked'){
                    $user->is_active='active';
                } elseif($user->is_active=='active'){
                    $user->is_active='blocked';
                }
                $user->save();
            }

        }
    }

}


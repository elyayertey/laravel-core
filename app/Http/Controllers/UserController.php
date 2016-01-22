<?php

namespace App\Http\Controllers;

use App\Settings;
use Request;
use App\Http\Requests;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;
use App\Users;
use Input;

class UserController extends Controller
{
    private $id;
    private $user;

    function __construct()
    {
        $this->id = Request::segment(3);
        $this->user= Users::find($this->id);
    }

    //
    public function edit(){
    $user = $this->user;
    return view('edituser', compact('user'));
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
      $user->save();
      $users = Users::all();
      return view('users')->with(compact('users'));

  }

    public function delete(Request $requests){
        if(Request::ajax()) {
            $id = $requests->input('id');
            Users::delete($id);
            //print_r($data);die;
        }
    }

}


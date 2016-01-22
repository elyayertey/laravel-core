<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Settings;
use App\Http\Requests\SettingsRequest;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PasswordRequest;
use Hash;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $user = Settings::find(Auth::user()->id);
        return view('settings', compact('user'));
    }

    public function save(SettingsRequest $requests){
        $user = Settings::find(Auth::user()->id);
        //check of a photo has been uploaded
        if(Request::hasFile('photo')){
            //get the image
            $image = $requests->file('photo');
            //get the file extension
            $ext = $image->getClientOriginalExtension();
            //create a unique file name
            $filename  = Auth::user()->id .Auth::user()->name . '.' .$ext;
            //get the file path
            $path = public_path('uploads/profile-pics/' . $filename);
            //delete existing file if any
            File::delete($path);
            //manipulate the image
            Image::make($image->getRealPath())->crop(150, 150)->save($path);
            //set the user photo value for update
            $user->photo = '/uploads/profile-pics/'.$filename;

        }

        $user->update(Request::except('photo'));
        return redirect('settings')->with('message', 'Profile successfully updated');
    }


    public function passwords(){
        $user = Settings::find(Auth::user()->id);
        return view('passwords', compact('user'));
    }


    public function changePassword(PasswordRequest $requests){
        $user = Settings::FindOrFail(Auth::user()->id);
        $user->fill(['password' => Hash::make($requests->newpassword)])->save();

            return redirect('passwords')->with('message', 'Password changed successfully.');

    }
}

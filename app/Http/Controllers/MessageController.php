<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Messages;
use App\Http\Requests\MessageRequest;
use Auth;
use App\Http\Requests\StatusRequest;
use App\Http\Requests\ReplyRequest;
use App\Reply;
class MessageController extends Controller
{
    public $msg;
    private $segment;

    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){
       $messages =  Messages::where('email', Auth::user()->email)->where('active', '1')->orderby('id', 'desc')->paginate(10);
        return view('messages', compact('messages'));
    }


    //
    public function sent(){
        $messages =  Messages::where('sender_id', Auth::user()->id)->where('active', '1')->orderby('id', 'desc')->paginate(10);
        return view('messages', compact('messages'));
    }

    //
    public function compose(){
        return view('compose');
    }

    //
    public function send(MessageRequest $requests){
        Messages::create($requests->all());
        $messages =  Messages::where('email', Auth::user()->email)->where('active', '1')->orderby('id', 'desc')->paginate(10);
       return redirect('/messages/inbox')->with('messages', $messages);
    }


    public function delete(StatusRequest $requests)
    {
        if(Request::ajax()) {
            $message = Messages::find($requests->input('id'));
            $message->delete();

       }
    }

    public function read(){
        $id = Request::segment(3);
        $messages = Messages::find($id);
        $replies = Reply::leftjoin('users', 'users.id', '=', 'reply.user_id')->where('reply.message_id', $id)->where('reply.Active', '1')->orderby('reply.created_at', 'desc')->paginate(5);
        return view('read', compact('messages', 'replies'));


    }


    public function savereply(ReplyRequest $requests){
        $id = $requests->input('message_id');
        Reply::create($requests->all());
        return redirect('messages/read/'.$id);
    }


}

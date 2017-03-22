<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chat;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function getDashboard() {
    	$posts = Chat::orderBy('created_at', 'desc')->get();
    	return view('dashboard', ['posts'=>$posts]);
    }

    public function postCreatePost(Request $request){
    	$this->validate($request, [
    		'body' => 'required|max:1000|min:3'
    		]);
    	$post = new Chat();
    	$post->body = $request['body'];
    	if($request['body'] != '')
    	$message2 = 'There was an error';
    	if ($request->user()->chats()->save($post)) {
    		$message = 'Message sent!';
    		Session::flash('message', $message); 
			Session::flash('alert-class', 'alert-success'); 
    	}else{
    		Session::flash('alert-class', 'alert-danger');
    		Session::flash('message', $message2 );
    	}
    	return redirect()->back();



    }
 }

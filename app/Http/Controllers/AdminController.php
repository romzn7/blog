<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\ContactMessage;
use App\Http\Requests\CreateLoginRequest;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function getAdminIndex(){
    	$posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $contact = ContactMessage::orderBy('created_at', 'desc')->take(3)->get();
    	foreach($posts as $post){
            $post->body = $this->shortenText($post->body, 20);
        }


    	return view('admin.index', ['posts' => $posts, 'contact' => $contact]);
    }

    public function getShowAllIndex(){
    	$posts = Post::orderBy('created_at', 'desc')->paginate(4);
    	foreach($posts as $post){
            $post->body = $this->shortenText($post->body, 20);
        }
    	return view('admin.blog.show_all', compact('posts'));
    }

    private function shortenText($text, $words_count){
        if(str_word_count($text, 0) > $words_count){
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$words_count]). "......";
        }
        return $text;
    }

    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(CreateLoginRequest $request){
        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->back()->with(['fail' => 'Invalid Username/ Password']);
        }
        return redirect()->route('admin.index');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('blog.home');
    }
}

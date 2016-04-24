<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getBlogIndex(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        foreach($posts as $post){
            $post->body = $this->shortenText($post->body, 20);
        }
    	return view('frontend.blog.index', compact('posts'));
    }

    public function getSinglePost($post_id, $end = 'frontend'){
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index');
        }
    	return view($end.'.blog.single', compact('post'));
    }

    public function getBlogContact(){
    	return view('frontend.other.contact');
    }

    public function getBlogAboutme(){
    	return view('frontend.other.about');
    }

    public function getCreatePost(){
        $category = Category::all();
        return view('admin.blog.create_post', compact('category'));
    }

    public function postCreatePost(CreatePostRequest $request){
        $post = new Post();
        $post->title = ucfirst($request->title);
        $post->author = ucfirst($request->author);
        //$post->category = $request->category_select;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('admin.index')->with(['success' => 'Post Sucessfully Created']);
    }

    public function getPostUpdate($post_id){
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index');
        }
        return view('admin.blog.edit_post', compact('post'));


    }

    public function postPostUpdate(CreatePostRequest $request){
        $post = Post::find($request['id']);
        if(!$post){
            return redirect()->route('admin.index');
        }
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();
        return redirect()->route('admin.index')->with(['success' => 'Post Updated']);

    }

    public function getPostDelete($post_id){
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index');
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post Deleted']);

    }
    private function shortenText($text, $words_count){
        if(str_word_count($text, 0) > $words_count){
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$words_count]). "......";
        }
        return $text;
    }
}

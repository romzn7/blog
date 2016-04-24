<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function getCategoryIndex(){
    	$categories = Category::orderBy('created_at', 'desc')->paginate(5);
    	return view('admin.blog.category', compact('categories'));
    }

    public function postCategoryCreate(CreateCategoryRequest $request){
    	$category = new Category();
    	$category->name= ucfirst($request['name']);
    	$category->save();
    	return redirect()->route('admin.blog.categories')->with(['success' => 'Category Created Successfully']);
    }

    public function getCategoryUpdate($category_id){
    	$category = Category::find($category_id);
    	if(!$category){
    		return redirect()->route('admin.blog.categories')->with(['error' =>  'Category not found']);
    	}
    	return view('admin.blog.edit_category', compact('category'));
    }

    public function postCategoryUpdate(CreateCategoryRequest $request){
    	$category = Category::find($request['category_id']);
    	if(!$category){
    		return redirect()->route('admin.blog.categories')->with(['error' =>  'Category not found']);
    	}
    	$category->name = ucfirst($request['name']);
    	$category->update();
    	return redirect()->route('admin.blog.categories')->with(['success' => 'Category Updated']);
    }

    public function getCategoryDelete($category_id){
    	$category = Category::find($category_id);
    	if(!$category){
    		return redirect()->route('admin.blog.categories')->with(['error' =>  'Category not found']);
    	}
    	$category->delete();
    	return redirect()->route('admin.blog.categories');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::group(['middleware' => ['web']], function () {
	Route::get('/', [
   		 'as' => 'home', 'uses' => 'PostController@getBlogIndex',
	]);
}*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [
   		 'as' => 'blog.home', 'uses' => 'PostController@getBlogIndex',
	]);

	Route::get('/blog', [
   		 'as' => 'blog.home', 'uses' => 'PostController@getBlogIndex',
	]);

	Route::get('/blog/{post_id}&{end}', [
   		 'as' => 'blog.single', 'uses' => 'PostController@getSinglePost',
	]);

	Route::get('/contact', [
   		 'as' => 'contact', 'uses' => 'ContactController@getContactIndex',
	]);

	Route::post('/contact/sendmessage', [
   		 'as' => 'contact/send', 'uses' => 'ContactController@postSendMessage',
	]);

	Route::get('/aboutme', [
   		 'as' => 'aboutme', 'uses' => 'PostController@getBlogAboutme',
	]);

	Route::get('/admin/login', [
		'as' => 'admin.login', 'uses' => 'AdminController@getLogin'
	]);

	Route::post('/admin/login', [
		'as' => 'admin.login', 'uses' => 'AdminController@postLogin'
	]);

	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	    Route::get('/', [
   		 'as' => 'admin.index', 'uses' => 'AdminController@getAdminIndex',
		]);

		Route::get('/blog/post/create', [
   		 'as' => 'admin.blog.create_post', 'uses' => 'PostController@getCreatePost',
		]);

		Route::get('/blog/post/{post_id}&{end}', [
   		 'as' => 'admin.blog.post.single', 'uses' => 'PostController@getSinglePost',
		]);

		Route::post('/blog/post/create', [
   		 'as' => 'admin.blog.post.create', 'uses' => 'PostController@postCreatePost',
		]);

		Route::get('/blog/posts', [
   		 'as' => 'admin.blog.post.all', 'uses' => 'AdminController@getShowAllIndex',
		]);

		Route::get('/blog/post/{post_id}/edit', [
   		 'as' => 'admin.blog.post.edit', 'uses' => 'PostController@getPostUpdate',
		]);

		Route::post('/blog/post/update', [
		'as' => 'admin.blog.post.update', 'uses' => 'PostController@postPostUpdate',
		]);

		Route::get('/blog/post/{post_id}/delete',[
		'as' => 'admin.blog.post.delete', 'uses' => 'PostController@getPostDelete',
		]);

		Route::get('/blog/categories', [
			'as' => 'admin.blog.categories', 'uses' => 'CategoryController@getCategoryIndex',
		]);

		Route::post('/blog/categories/create', [
			'as' => 'admin.blog.categories.create', 'uses' => 'CategoryController@postCategoryCreate',
		]);

		Route::get('/blog/categories/{category_id}/edit', [
			'as' => 'admin.blog.categories.edit', 'uses' => 'CategoryController@getCategoryUpdate'
		]);

		Route::post('/blog/categories/update', [
			'as' => 'admin.blog.categories.update', 'uses' => 'CategoryController@postCategoryUpdate'
		]);

		Route::get('/blog/categories/{category_id}/delete',[
		'as' => 'admin.blog.categories.delete', 'uses' => 'CategoryController@getCategoryDelete',
		]);

		Route::get('/blog/contact-messages', [
			'as' => 'admin.blog.contact-messages', 'uses' => 'ContactController@getContactMessages'
		]);

		Route::get('/blog/contact-messages/{cont_id}', [
			'as' => 'admin.blog.contact-messages/single', 'uses' => 'ContactController@getSingleContactMessages'
		]);

		Route::get('/blog/contact-messages/{cont_id}/delete', [
			'as' => 'admin.blog.contact-messages/delete', 'uses' => 'ContactController@getContactMessageDelete'
		]);

		Route::get('/logout', [
			'as' => 'admin.logout', 'uses'=> 'AdminController@getLogout'
		]);
	});
   
});

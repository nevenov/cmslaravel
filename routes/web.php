<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// register the proper routes for the new authentication controllers
Auth::routes();

// The Auth::routes method now registers a POST route for /logout instead of a GET route.
// So, now we register our own GET route for the /logout URI
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/post/{id}', ['as'=>'post.home', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){


    Route::get('/admin', function (){

        return view('admin.index');

    });


    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'

    ]]);


    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'

    ]]);


    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'

    ]]);


    Route::resource('/admin/media', 'AdminMediasController', ['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'

    ]]);



    Route::resource('/admin/comments', 'PostCommentsController', ['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show'

    ]]);


    Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names'=>[

        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit',
        'show'=>'admin.comment.replies.show'

    ]]);

});


Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});
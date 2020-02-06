<?php

Route::group (['middleware' => 'auth'], function () {
    Route ::get ('/', 'CommentController@index');

    Route ::get ('/comment/{comment}/', 'CommentController@show');

    Route ::get ('/comment/{comment}/delete/', 'CommentController@destroy');


    Route ::get ('/comment/{comment}/edit/', 'CommentController@edit');
    Route ::post ('/comment/{comment}/edit/', 'CommentController@update');

    Route ::get ('/add/', 'CommentController@create');
    Route ::post ('/add/', 'CommentController@store');


    Route ::get ('/comment/{comment}/like/', 'LikesController@upVote');
    Route ::get ('/comment/{comment}/dislike/', 'LikesController@downVote');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

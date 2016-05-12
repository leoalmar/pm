<?php


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'oauth'], function(){

    Route::resource('client','ClientsController',['except' => ['create','edit']]);


    Route::resource('project','ProjectsController',['except' => ['create','edit']]);

    Route::group(['prefix' => 'project'], function(){

        Route::get('{id}/note','ProjectNotesController@index');
        Route::post('{id}/note','ProjectNotesController@store');
        Route::get('{id}/note/{noteId}','ProjectNotesController@show');
        Route::put('{id}/note/{noteId}','ProjectNotesController@update');
        Route::delete('{id}/note/{noteId}','ProjectNotesController@destroy');
    });

});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
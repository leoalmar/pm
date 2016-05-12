<?php


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'oauth'], function(){

    Route::get('client','ClientsController@index');
    Route::post('client','ClientsController@store');
    Route::get('client/{id}','ClientsController@show');
    Route::put('client/{id}','ClientsController@update');
    Route::delete('client/{id}','ClientsController@destroy');

    Route::get('project/{id}/note','ProjectNotesController@index');
    Route::post('project/{id}/note','ProjectNotesController@store');
    Route::get('project/{id}/note/{noteId}','ProjectNotesController@show');
    Route::put('project/{id}/note/{noteId}','ProjectNotesController@update');
    Route::delete('project/{id}/note/{noteId}','ProjectNotesController@destroy');

    Route::get('project','ProjectsController@index');
    Route::post('project','ProjectsController@store');
    Route::get('project/{id}','ProjectsController@show');
    Route::put('project/{id}','ProjectsController@update');
    Route::delete('project/{id}','ProjectsController@destroy');
});





Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
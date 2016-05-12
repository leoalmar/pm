<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('client','ClientsController@index');
Route::post('client','ClientsController@store');
Route::put('client/{id}','ClientsController@update');
Route::get('client/{id}','ClientsController@show');
Route::delete('client/{id}','ClientsController@destroy');



Route::get('project/{id}/note','ProjectNotesController@index');

Route::get('project','ProjectsController@index');
Route::post('project','ProjectsController@store');
Route::put('project/{id}','ProjectsController@update');
Route::get('project/{id}','ProjectsController@show');
Route::delete('project/{id}','ProjectsController@destroy');



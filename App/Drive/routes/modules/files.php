<?php 

Route::post('/', 'FilesController@create')->middleware('gate:task.drive.files.create');

Route::get('/', 'FilesController@paging')->middleware('gate:task.drive.files.paging');
Route::get('select', 'FilesController@select')->middleware('gate:task.drive.files.select.access');
Route::get('{id}', 'FilesController@view')->middleware('gate:task.drive.files.view');
Route::get('public/{id}', 'FilesController@view');

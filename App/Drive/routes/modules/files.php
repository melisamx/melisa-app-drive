<?php 

Route::get('/', 'FilesController@paging')->middleware('gate:task.drive.files.paging');
Route::post('/', 'FilesController@create')->middleware('gate:task.drive.files.create');

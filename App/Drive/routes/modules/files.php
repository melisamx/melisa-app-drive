<?php 

Route::get('/', 'FilesController@paging')->middleware('gate:task.drive.files.paging');

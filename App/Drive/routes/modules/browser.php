<?php 

Route::get('view', 'BrowserController@view')->middleware('gate:task.drive.browser.view.access');

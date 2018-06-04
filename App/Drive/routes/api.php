<?php 

Route::group([
    'prefix'=>'v1',
    'namespace' =>'v1',
    'middleware'=>'auth:api'
], function() {
    Route::group([
        'prefix'=>'files'
    ], function() {
        Route::get('/', 'FilesController@paging')
            ->middleware('gate:task.drive.files.paging');
        Route::post('/', 'FilesController@upload')
            ->middleware('gate:task.api.drive.files.upload');
    });
    Route::group([
        'prefix'=>'folders'
    ], function() {
        Route::get('/', 'FoldersController@paging')
            ->middleware('gate:task.drive.folders.paging');
        Route::post('/', 'FoldersController@create')
            ->middleware('gate:task.drive.folders.create');
    });
});

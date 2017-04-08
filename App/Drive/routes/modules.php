<?php 

Route::group([
    'prefix'=>'browser',
], function() {
    
    require realpath(base_path() . '/routes/modules/browser.php');
    
});

Route::group([
    'prefix'=>'files',
], function() {
    
    require realpath(base_path() . '/routes/modules/files.php');
    
});

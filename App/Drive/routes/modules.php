<?php 

Route::group([
    'prefix'=>'browser',
], function() {
    
    require realpath(base_path() . '/routes/modules/browser.php');
    
});

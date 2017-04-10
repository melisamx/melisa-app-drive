Ext.define('Melisa.drive.ux.filemanager.Local', {
    
    createRequest: function(type, size, callback) {
        
        window.requestFileSystem  = window.requestFileSystem || window.webkitRequestFileSystem;
        
        window.webkitStorageInfo.requestQuota(type, size, callback);
        
    },
    
    errorHandler: function() {
        
        var msg = '';

        switch (e.code) {
            case FileError.QUOTA_EXCEEDED_ERR:
                msg = 'QUOTA_EXCEEDED_ERR';
                break;
            case FileError.NOT_FOUND_ERR:
                msg = 'NOT_FOUND_ERR';
                break;
            case FileError.SECURITY_ERR:
                msg = 'SECURITY_ERR';
                break;
            case FileError.INVALID_MODIFICATION_ERR:
                msg = 'INVALID_MODIFICATION_ERR';
                break;
            case FileError.INVALID_STATE_ERR:
                msg = 'INVALID_STATE_ERR';
                break;
            default:
                msg = 'Unknown Error';
                break;
        };

        console.log('Error: ' + msg);
        
    }
    
});

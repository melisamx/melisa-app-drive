/**
 * https://github.com/ivan-novakov/extjs-upload-widget
 * @type type
 */
Ext.define('Melisa.drive.ux.uploader.Manager', {
    
    requires: [
        'Melisa.drive.ux.uploader.FormUploader',
        'Melisa.drive.ux.uploader.Queue'
    ],
    
    mixins : {
        observable : 'Ext.util.Observable'
    },
    
    config: {
        queue: null,
        uploader: null,
        uploading: false
    },
    
    constructor: function (config) {
        
        var me = this;
        
        me.mixins.observable.constructor.call(me, config);
        
    },
    
    addFiles: function(files, idFileParent) {
        
        var me = this,
            queue = me.createQueue();
        
        queue.addFiles(files, idFileParent);
        
    },
    
    createQueue: function () {
        
        var me = this,
            queue = me.getQueue();
    
        if( queue) {
            return queue;
        }
        
        queue = Ext.create('Melisa.drive.Queue', {
            listeners: {
                add: me.onAddQueue,
                scope: me
            }
        });
        me.setQueue(queue);
        return queue;
        
    },
    
    onAddQueue: function (index, objectFile, key) {
        
        var me = this;
        
        me.fireEvent('fileadd', objectFile, me);
        
        if( me.getUploading()) {
            console.log('ignore upload, added queue');
            return;
        }
        
        me.setUploading(true);
        me.uploadNextItem();    
        
    },
    
    uploadNextItem: function(info) {
        
        var me = this,
            queue = me.getQueue(),
            nextItem = queue.getFirstReadyItem(),
            uploader = me.createUploader();
    
        if (!nextItem) {
            console.log('uploadNextItem', info);
            me.fireEvent('uploadallfinish', info);
            return;
        }
        
        uploader.uploadItem(nextItem);
        
    },
    
    createUploader: function () {
        
        var me = this,
            uploader = me.getUploader(),
            uploaderOptions;
    
        if( uploader) {
            return uploader;
        }
        
        uploaderOptions = me.uploaderOptions || {};
        Ext.applyIf(uploaderOptions, {
            uploadsuccess: me.onUploadSuccess,
            failure: me.onUploadFailure,
            progress: me.onUploadProgress
        });
        
        uploader = Ext.create('Melisa.drive.ux.uploader.FormUploader', uploaderOptions);
        me.mon(uploader, 'uploadsuccess', me.onUploadSuccess, me);
        me.mon(uploader, 'uploadfailure', me.onUploadFailure, me);
        me.mon(uploader, 'uploadprogress', me.onUploadProgress, me);
        
        me.setUploader(uploader);
        return uploader;
        
    },
    
    onUploadSuccess: function (item, info) {
              
        var me = this;
         
        item.setUploaded();
        me.setUploading(false);
        me.uploadNextItem(info);
        me.fireEvent('uploaditemsuccess', Ext.decode(info.response.responseText, true));
        
    },
    
    onUploadFailure: function () {
        
        var me = this;
        console.log('onUploadFailure', arguments);
        me.setUploading(false);
        me.uploadNextItem();
        
    },
    
    onUploadProgress: function (item, event) {
        
        var me = this;
        console.log('onUploadProgress', arguments);
        item.setProgress(event.loaded);
        me.fireEvent('fileprogress', item, me);
        
    }
    
});
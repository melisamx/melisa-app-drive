Ext.define('Melisa.drive.view.phone.upload.manager.List', {
    extend: 'Ext.List',
    alias: 'widget.driveuploadmanagergrid',

    cls: 'browser',
    mode: 'MULTI',
    itemTpl: [
        '<div class="progress">{progress}</div">'
    ],
    bind: {
        store: '{files}'
    }
    
});

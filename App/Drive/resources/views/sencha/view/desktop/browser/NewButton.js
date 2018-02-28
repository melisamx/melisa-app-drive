Ext.define('Melisa.drive.view.desktop.browser.NewButton', {
    extend: 'Ext.button.Split',
    alias: 'widget.drivebrowserbuttonnew',
    
    requires: [
        'Melisa.drive.view.desktop.upload.manager.BrowseButton'
    ],
    
    cls: 'button-new',
    text: 'Nuevo',
    plain: true,
    arrowVisible: false,
    flex: 1,
    margin: '0 18',
    menu: {
        xtype: 'menu',
        cls: 'button-new-menu',
        items: [
            {
                text: 'Carpeta nueva...',
                iconCls: 'x-fa fa-folder',
                listeners: {
                    click: 'onClickAddFolder'
                }
            },
            {
                text: 'Subir archivo',
                iconCls: 'x-fa fa-upload',
                handler: 'onClickBtnUploadFile'
            },
            {
                xtype: 'driveuploadbrowsebutton',
                reference: 'btnBrowseUpload',
                hidden: true,
                listeners: {
                    fileselected: 'onFilesSelected'
                }
            },
            '-',
            {
                text: 'Documentos de Melisa',
                iconCls: 'x-fa fa-file-text'
            }
        ]
    },
    handler: function() {
        this.showMenu();
    }
});
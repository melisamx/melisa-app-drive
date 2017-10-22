Ext.define('Melisa.drive.view.desktop.files.select.Wrapper', {
    extend: 'Melisa.view.desktop.window.Modal',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.view.desktop.window.Modal',
        'Melisa.view.desktop.default.toolbar.Select',
        'Melisa.drive.view.desktop.browser.Browser',
        'Melisa.drive.view.desktop.files.select.WrapperController',
        'Melisa.drive.view.desktop.browser.navigation.BreadCrumb',
        'Melisa.drive.view.desktop.files.Details',
        'Melisa.drive.view.desktop.upload.manager.BrowseButton'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'drivefilesselect',
    cls: 'app-drive-browser',
    layout: 'border',
    width: '100%',
    height: '100%',
    bodyPadding: 0,
    maximizable: true,
    bind: {
        title: '{wrapper.title}'
    },
    viewModel: {
        stores: {
            files: {
                autoLoad: true,
                remoteFilter: true,
                remoteSort: true,
                sorters: {
                    property : 'updatedAt',
                    direction: 'DESC'
                },
                proxy: {
                    type: 'ajax',
                    url: '{modules.files}',
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                }
            }
        }
    },
    items: [
        {
            region: 'center',
            xtype: 'drivebrowser',
            reference: 'griBrowser',
            listeners: {
                itemdblclick: 'onItemdblclick',
                selectionchange: 'onSelectionChange'
            },
            selModel: {
                selType: 'checkboxmodel'
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    docked: 'top',
                    height: 53,
                    items: [
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
                        {
                            xtype: 'drivebrowsernavigationbreadcrumb'
                        },
                        '->',
                        {
                            iconCls: 'x-fa fa-th',
                            tooltip: 'Vista de cuadrícula'
                        },
                        {
                            iconCls: 'x-fa fa-info-circle',
                            tooltip: 'Ver detalles',
                            reference: 'btnDetailsView',
                            enableToggle: true,
                            pressed: true,
                            listeners: {
                                click: 'onClickBtnDetailsView'
                            }
                        }
                    ]
                }
            ]
        },
        {
            xtype: 'drivefilesdetails',
            region: 'east'
        }
    ],
    bbar: {
        xtype: 'defaultoolbarselect'
    }
    
});

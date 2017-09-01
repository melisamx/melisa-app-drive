Ext.define('Melisa.drive.view.desktop.browser.Wrapper', {
    extend: 'Ext.panel.Panel',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.drive.view.desktop.browser.navigation.BreadCrumb',
        'Melisa.drive.view.desktop.browser.Browser',
        'Melisa.drive.view.desktop.browser.WrapperModel',
        'Melisa.drive.view.desktop.browser.NewButton',
        'Melisa.drive.view.desktop.browser.navigation.Options',
        'Melisa.drive.view.desktop.browser.WrapperController'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    cls: 'app-drive-browser',
    layout: 'border',
    controller: 'drivebrowser',
    iconCls: 'x-fa fa fa-hdd-o',
    items: [
        {
            region: 'center',
            xtype: 'drivebrowser',
            listeners: {
                itemdblclick: 'onItemdblclickFile'
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    docked: 'top',
                    height: 53,
                    items: [
//                        {
//                            xtype: 'label',
//                            cls: 'label',
//                            html: 'Mi unidad'
//                        },
//                        {
//                            xtype: 'drivebrowsernavigationbreadcrumb'
//                        },
                        '->',
                        {
                            xtype: 'textfield',
                            cls: 'searchfield',
                            emptyText: 'Search'
                        }
                    ]
                }
            ]
        },
        {
            region: 'west',
            layout: 'border',
            width: 222,
            minWidth: 222,
            maxWidth: 394,
            split: true,
            dockedItems: [
                {
                    xtype: 'toolbar',
                    docked: 'top',
                    height: 53,
                    cls: 'wrapper-button-new',
                    items: [
                        {
                            xtype: 'drivebrowserbuttonnew'
                        }
                    ]
                }
            ],
            items: [
                {
                    region: 'center',
                    xtype: 'drivebrowsernavigationoptions'
                }
            ]
        }
    ],
    viewModel: {
        type: 'drivebrowser'
    }
    
});

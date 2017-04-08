Ext.define('Melisa.drive.view.desktop.files.Details', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.drivefilesdetails',
    
    reference: 'wrapperDetails',
    itemId: 'wrapperDetails',
    cls: 'details',
    width: 320,
    hidden: true,
    collapsed: true,
    bind: {
        iconCls: '{griBrowser.selection.iconCls}',
        title: '{griBrowser.selection.name}'
    },
    items: [
        {
            xtype: 'tabpanel',
            items: [
                {
                    title: 'Detalles',
                    bodyPadding: '10 0',
                    layout: {
                        type: 'vbox',
                        align: 'stretch'
                    },
                    items: [
                        {
                            xtype: 'container',
                            height: 212,
                            reference: 'conDetailImage',
                            tpl: [
                                '<tpl if="showPreview">',
                                    '<img src="{url}{id}/320/200/" />',
                                '<tpl elseif="showSelect">',
                                    '<div class="selection-required">',
                                        '<i class="icon fa fa-comment-o" aria-hidden="true"></i>',
                                        '<p class="message">Selecciona un archivo o una carpeta para ver sus detalles</p>',
                                    '</div>',
                                '</tpl>'
                            ]
                        },
                        {
                            xtype: 'container',
                            flex: 1
                        }
                    ]
                }
            ]
        }
    ]
});
Ext.define('Melisa.drive.view.phone.browser.Browser', {
    extend: 'Ext.dataview.List',
    alias: 'widget.drivebrowser',

    cls: 'browser',
    mode: 'MULTI',
    grouped: true,
    publishes: [
        'hidden'
    ],
    itemTpl: [
        '<div class="wrapper" style="min-width: {[this.getWidth()]}px; min-height: {[this.getHeight()]}px">',
            '<tpl if="this.isImage(values.mimeType)">',
            '<img class="preview" src="{[this.getUrl()]}{id}/{[this.getWidth()]}/{[this.getHeight()]}/" alt="{name}" />',
            '<tpl else>',
            '<i class="icon {iconCls}"></i>',
            '</tpl>',
            '<i class="icon-selected fa fa-check"></i>',
        '</div">',
        {
            isImage: function(mimeType) {
                return mimeType.indexOf('image') !== -1;
            },
            getUrl: function() {                
                return this.imagesView;
            },
            getWidth: function() {
                return this.width || 52;
            },
            getHeight: function() {
                return this.height || 52;
            }
        }
    ],
    bind: {
        store: '{files}'
    },
    plugins: [
        {
            xclass: 'Ext.plugin.ListPaging',
            autoPaging: true
        }
    ]
    
});

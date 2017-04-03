Ext.define('Melisa.drive.view.phone.browser.Browser', {
    extend: 'Ext.dataview.List',
    alias: 'widget.drivebrowser',

    cls: 'browser',
    itemTpl: [
        '<div class="wrapper">',
            '<img class="photo" alt="{id}" />',
            '<h2 class="name">{name}</h2>',
            '<p class="size">{size:fileSize}</p>',
        '</div">'
    ],
    bind: {
        store: '{files}'
    }
    
});

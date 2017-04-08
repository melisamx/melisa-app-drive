Ext.define('Melisa.drive.view.desktop.browser.navigation.BreadCrumb', {
    extend: 'Ext.toolbar.Breadcrumb',
    alias: 'widget.drivebrowsernavigationbreadcrumb',
    
    showIcons: true,
    bind: {
        store: '{breadcrumb}'
    }
});

Ext.define('Melisa.drive.view.phone.files.select.Wrapper', {
    extend: 'Melisa.view.phone.default.Wrapper',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.view.phone.default.Wrapper',
        'Melisa.drive.view.phone.browser.Browser',
        'Melisa.drive.view.phone.files.select.WrapperController',
        'Melisa.drive.view.universal.files.select.WrapperModel',
        'Melisa.drive.view.phone.files.select.titles.Main',
        'Melisa.drive.view.phone.files.select.titles.MainBottom'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'drivefilesselect',
    cls: 'app-drive-phone-browser',
    layout: 'card',
    viewModel: {
        type: 'drivefilesselect'
    },
    items: [
        {
            xtype: 'drivefilesselecttitlemain',
            bind: {
                hidden: '{lisBrowser.hidden}'
            }
        },
        {
            xtype: 'drivefilesselecttitlemainbottom',
            bind: {
                hidden: '{lisBrowser.hidden}'
            }
        },
        {
            xtype: 'drivebrowser',
            reference: 'lisBrowser'
        }
    ]  
});

Ext.define('Melisa.drive.view.universal.files.select.WrapperModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.drivefilesselect',
    
    stores: {
        files: {
            autoLoad: false,
            remoteFilter: true,
            sortProperty: 'lastUpload',
            proxy: {
                type: 'ajax',
                url: '{modules.files}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            grouper: {
                groupFn: function(record) {
                    return typeof  record.data.lastUpload === 'undefined' ? 'Existentes' : 'Nuevas';
                },
                sorterFn: function(person1, person2) {
                    return (typeof person1.data.lastUpload === 'undefined') ? 1 : (person1.data.lastUpload === person2.data.lastUpload ? 0 : -1);
                }
            }
        }
    }
});
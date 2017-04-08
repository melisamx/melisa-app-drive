Ext.define('Melisa.drive.view.desktop.BrowserDetails', {
    
    onCollapseWrapperDetails: function() {
        
        this.lookup('wrapperDetails').hide();
        
    },
    
    onClickBtnDetailsView: function(button) {
        
        var me = this,
            wrapperDetails = me.lookup('wrapperDetails');
    
        if( button.pressed) {
            wrapperDetails.show();
            wrapperDetails.expand();
            me.showDetail(me.lookup('griBrowser').getSelection());
        } else {
            wrapperDetails.collapse();
        }
        
    },
    
    onSelectionChange: function(m, selection) {
        
        this.showDetail(selection);
        
    },
    
    showDetail: function(selection) {
        
        var me = this,
            vm = me.getViewModel(),
            wrapperDetails = me.lookup('wrapperDetails'),
            conDetailImage = me.lookup('conDetailImage'),
            btnDetailsView = me.lookup('btnDetailsView'),
            data;
        
        if( Ext.isEmpty(selection) || !btnDetailsView.pressed) {
            conDetailImage.setData({
                showSelect: true
            });
            return;
        }
        
        wrapperDetails.show();
        wrapperDetails.expand();
        
        data = selection[0].data;
        data.showPreview = false;
        
        if( selection[0].get('mimeType').indexOf('image') !== -1) {
            data.url = vm.get('modules.imagesView');
            data.showPreview = true;
        } else {
            data.url = vm.get('modules.filesView');
        }
        
        conDetailImage.setData(data);
        
    }
    
});

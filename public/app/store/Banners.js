Ext.define('Artics.store.Banners', {
    extend: 'Ext.data.Store',

    alias: 'store.banners',

    autoLoad: true,
    loadMask: true,
    pageSize: 185,

    model: 'Artics.model.Banner',

    proxy: {
        type: 'ajax',
        url: '/banners',
        reader: {
            type: 'json',
            rootProperty: 'items',
            totalProperty: 'total'
        }
    }
});

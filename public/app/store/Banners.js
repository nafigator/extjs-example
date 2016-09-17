Ext.define('Artics.store.Banners', {
    extend: 'Ext.data.Store',

    alias: 'store.banners',

    required: [
        'Ext.Store.data.proxy.Rest'
    ],

    autoLoad: true,
    loadMask: true,

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

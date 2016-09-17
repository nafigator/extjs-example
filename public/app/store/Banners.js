Ext.define('Artics.store.Banners', {
    extend: 'Ext.data.Store',

    alias: 'store.banners',

    required: [
        'Ext.Store.data.proxy.Rest'
    ],

    autoLoad: true,

    model: 'Artics.model.Banner',

    proxy: {
        type: 'rest',
        url: '/banners',
        reader: {
            type: 'json',
            rootProperty: 'items',
            totalProperty: 'total'
        }
    }
});

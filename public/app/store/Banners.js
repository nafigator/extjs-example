Ext.define('Artics.store.Banners', {
    extend: 'Ext.data.Store',

    alias: 'store.banners',

    model: 'Artics.model.Banner',

    proxy: {
        type: 'ajax',
        url: '/load',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    },

    autoLoad: true
});

Ext.define('Artics.view.main.List', {
    extend: 'Ext.grid.Panel',
    xtype: 'mainlist',

    requires: [
        'Artics.store.Banners'
    ],

    title: 'Banners',

    store: {
        type: 'banners'
    },

    columns: [
        { text: 'Campaign', dataIndex: 'campaign_id' },
        { text: 'Ad', dataIndex: 'ad_id' },
        { text: 'Title', dataIndex: 'title', flex: 1 },
        { text: 'Shows', dataIndex: 'shows', flex: 1 },
        { text: 'Clicks', dataIndex: 'clicks', flex: 1 },
        { text: 'Costs', dataIndex: 'costs'}
    ],

    listeners: {
        select: 'onItemSelected'
    },

    tbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true,
        emptyMsg: 'No data to display',
        items: ['->'],
        prependButtons: true
    },
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true,
        emptyMsg: 'No data to display',
        items: ['->'],
        prependButtons: true
    }
});

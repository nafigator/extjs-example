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
        { text: 'Campaign ID', dataIndex: 'campaign_id' },
        { text: 'Ad ID', dataIndex: 'ad_id' },
        { text: 'Banner title', dataIndex: 'title', flex: 1 },
        { text: 'Shows', dataIndex: 'shows' },
        { text: 'Clicks', dataIndex: 'clicks' },
        { text: 'Costs', dataIndex: 'costs'},
        { text: 'Campaign name', dataIndex: 'campaign_name', flex: 1 },
        { text: 'Sex', dataIndex: 'sex' },
        { text: 'Age from', dataIndex: 'age_from' },
        { text: 'Age to', dataIndex: 'age_to' },
        { text: 'Budget', dataIndex: 'budget_limit' },
        { text: 'Payment', dataIndex: 'payment_type' }
    ],

    listeners: {
        select: 'onItemSelected'
    },

    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true,
        emptyMsg: 'No data to display',
        items: ['->'],
        prependButtons: true
    }
});

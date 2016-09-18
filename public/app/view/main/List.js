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
        {
            text: 'Banner title',
            dataIndex: 'title',
            summaryType: 'count',
            summaryRenderer: function(value, summaryData, dataIndex) {
                return ((value === 0 || value > 1)
                    ? '(' + value + ' Banners)'
                    : '(1 Banner)');
            },
            flex: 1
        },
        { text: 'Shows', dataIndex: 'shows', summaryType: 'sum' },
        { text: 'Clicks', dataIndex: 'clicks', summaryType: 'sum' },
        {
            text: 'Costs',
            dataIndex: 'costs',
            renderer: Ext.util.Format.numberRenderer('0.00'),
            summaryRenderer: Ext.util.Format.numberRenderer('0.00'),
            summaryType: 'sum'
        },
        {
            text: 'Campaign name',
            dataIndex: 'campaign_name',
            summaryType: 'count',
            summaryRenderer: function(value, summaryData, dataIndex) {
                return ((value === 0 || value > 1)
                    ? '(' + value + ' Campaigns)'
                    : '(1 Campaign)');
            },
            flex: 1
        },
        { text: 'Sex', dataIndex: 'sex' },
        { text: 'Age from', dataIndex: 'age_from', summaryType: 'min' },
        { text: 'Age to', dataIndex: 'age_to', summaryType: 'max' },
        { text: 'Budget', dataIndex: 'budget_limit', summaryType: 'sum' },
        { text: 'Payment', dataIndex: 'payment_type' }
    ],

    features: [{
        id: 'group',
        ftype: 'groupingsummary',
        groupHeaderTpl: '{name}',
        startCollapsed: true,
        hideGroupedHeader: true,
        enableGroupingMenu: true
    }],

    //listeners: {
    //    groupchange: 'groupGrid'
    //},

    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true,
        emptyMsg: 'No data to display',
        items: ['->'],
        prependButtons: true
    }
});

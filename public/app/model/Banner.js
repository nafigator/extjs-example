Ext.define('Artics.model.Banner', {
    extend: 'Ext.data.Model',
    fields: [
        { name: 'campaign_id', type: 'int', defaultValue: 0 },
        { name: 'ad_id', type: 'int', defaultValue: 0 },
        { name: 'title', type: 'string', defaultValue: '' },
        { name: 'shows', type: 'int', defaultValue: 0 },
        { name: 'clicks', type: 'int', defaultValue: 0 },
        { name: 'costs', type: 'int', defaultValue: 0 }
    ]
});

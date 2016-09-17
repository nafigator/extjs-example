Ext.define('Artics.model.Banner', {
    extend: 'Ext.data.Model',
    fields: [
        { name: 'campaign_id', type: 'int', defaultValue: 0 },
        { name: 'ad_id', type: 'int', defaultValue: 0 },
        { name: 'title', type: 'string', defaultValue: '' },
        { name: 'shows', type: 'int', defaultValue: 0 },
        { name: 'clicks', type: 'int', defaultValue: 0 },
        { name: 'costs', type: 'number', defaultValue: 0.0 },
        { name: 'campaign_name', type: 'string', defaultValue: '' },
        { name: 'sex', type: 'string', defaultValue: '' },
        { name: 'age_from', type: 'int', defaultValue: 0 },
        { name: 'age_to', type: 'int', defaultValue: 0 },
        { name: 'budget_limit', type: 'int', defaultValue: 0 },
        { name: 'payment_type', type: 'string', defaultValue: '' }
    ]
});

/**
 * This class is the controller for the main view for the application. It is specified as
 * the "controller" of the Main view class.
 */
Ext.define('Artics.view.main.MainController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.main',

    control: {
        'grid':{
            afterrender: 'onGridAfterRender'
        }
    },

    onGridAfterRender: function () {
        Ext.getBody().unmask();
    }
});

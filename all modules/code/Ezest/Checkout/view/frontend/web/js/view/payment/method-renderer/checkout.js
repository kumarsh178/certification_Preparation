define([
        'jquery',
        'Magento_Payment/js/view/payment/cc-form'
    ],
    function ($, Component) {
        'use strict';
 
        return Component.extend({
            defaults: {
                template: 'Ezest_Checkout/payment/checkout'
            },
 
            context: function() {
                return this;
            },
 
            getCode: function() {
                return 'ezest_checkout';
            },
 
            isActive: function() {
                return true;
            }
        });
    }
);
 
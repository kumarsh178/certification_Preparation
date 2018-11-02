define([
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component, rendererList) {
        'use strict';
 
        rendererList.push(
            {
                type: 'ezest_checkout',
                component: 'Ezest_Checkout/js/view/payment/method-renderer/checkout'
            }
        );
 
        /** Add view logic here if needed */
        return Component.extend({});
    });
 
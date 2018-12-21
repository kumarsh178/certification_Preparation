define(
    [
		'ko',
        'Ezest_Brand/js/view/checkout/summary/extfee',
		'Magento_Checkout/js/model/quote',
		'Magento_Catalog/js/price-utils',
		'Magento_Checkout/js/model/totals'
    ],
    function (ko, Component,quote,priceUtils, totals) {
        'use strict';

		var custom_fee_amount = 0;

		if (totals.getSegment('extfee'))
		{
			custom_fee_amount=totals.getSegment('extfee').value
		}

		var extfee_label = window.checkoutConfig.extfee_label;

        return Component.extend({

			getFormattedPrice: ko.observable(priceUtils.formatPrice(custom_fee_amount, quote.getPriceFormat())),
			getFeeLabelExtfee:ko.observable(extfee_label),
            isDisplayed: function () {
                return this.isFullMode() && this.getPureValue() != 0;
            }
        });
    }
);
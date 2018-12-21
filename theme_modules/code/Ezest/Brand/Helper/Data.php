<?php

namespace Ezest\Brand\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper {

	
	const CONFIG_CUSTOM_IS_ENABLED_EXTFEE = 'extfee_customfee/extfee_customfee/extfee_status';
	const CONFIG_CUSTOM_FEE_EXTFEE = 'extfee_customfee/extfee_customfee/extfee_customfeeamount';
	const CONFIG_FEE_LABEL_EXTFEE = 'extfee_customfee/extfee_customfee/extfee_name';
	const CONFIG_MINIMUM_ORDER_AMOUNT_EXTFEE = 'extfee_customfee/extfee_customfee/extfee_minimumorderamount';

	public function isModuleEnabledExtfee() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$isEnabled = $this -> scopeConfig -> getValue(self :: CONFIG_CUSTOM_IS_ENABLED_EXTFEE, $storeScope);
		return $isEnabled;
	} 

	public function getCustomFeeExtfee() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$fee = $this -> scopeConfig -> getValue(self :: CONFIG_CUSTOM_FEE_EXTFEE, $storeScope);
		return $fee;
	} 

	public function getFeeLabelExtfee() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$feeLabel = $this -> scopeConfig -> getValue(self :: CONFIG_FEE_LABEL_EXTFEE, $storeScope);
		return $feeLabel;
	} 

	public function getMinimumOrderAmountExtfee() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$MinimumOrderAmount = $this -> scopeConfig -> getValue(self :: CONFIG_MINIMUM_ORDER_AMOUNT_EXTFEE, $storeScope);
		return $MinimumOrderAmount;
	} 
	

} 

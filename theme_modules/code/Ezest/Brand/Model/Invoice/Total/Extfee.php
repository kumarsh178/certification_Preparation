<?php

namespace Ezest\Brand\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;

class Extfee extends AbstractTotal {

	public function collect(\Magento\Sales\Model\Order\Invoice $invoice) {

		$order = $invoice -> getOrder();

		$percent = $invoice -> getSubtotal() / $order -> getSubtotal();

		$invoice -> setExtfee(0);
		$invoice -> setBaseExtfee(0);

		$amount = $invoice -> getOrder() -> getExtfee() * $percent;

		$baseAmount = $invoice -> getOrder() -> getBaseExtfee() * $percent;

		$invoice -> setExtfee($amount);

		$invoice -> setBaseExtfee($baseAmount);

		$invoice -> setGrandTotal($invoice -> getGrandTotal() + $amount);
		$invoice -> setBaseGrandTotal($invoice -> getBaseGrandTotal() + $invoice -> getBaseExtfee() * $baseAmount);

		return $this;
	} 
} 
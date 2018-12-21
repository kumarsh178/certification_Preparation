<?php

namespace Ezest\Brand\Model\Creditmemo\Total;

use Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal;

class Extfee extends AbstractTotal {

	public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo) {

		$order = $creditmemo -> getOrder();

		$percent = $creditmemo -> getSubtotal() / $order -> getSubtotal();

		$creditmemo -> setExtfee(0);
		$creditmemo -> setBaseExtfee(0);

		$amount = $creditmemo -> getOrder() -> getExtfee() * $percent;
		$baseAmount = $creditmemo -> getOrder() -> getBaseExtfee() * $percent;

		$creditmemo -> setExtfee($amount);

		$creditmemo -> setBaseExtfee($baseAmount);

		$creditmemo -> setGrandTotal($creditmemo -> getGrandTotal() + $amount);
		$creditmemo -> setBaseGrandTotal($creditmemo -> getBaseGrandTotal() + $baseAmount);

		return $this;
	} 
} 
<?php

namespace Ezest\Brand\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class AddFeeToOrderObserver implements ObserverInterface
{

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $quote = $observer->getQuote();
		$order = $observer->getOrder();

		
        $CustomFeeExtfee = $quote->getExtfee();
        $CustomFeeBaseExtfee = $quote->getBaseExtfee();

        if ($CustomFeeExtfee&&$CustomFeeBaseExtfee) {

			$order->setData('extfee', $CustomFeeExtfee);
			$order->setData('base_extfee', $CustomFeeBaseExtfee);

        }


        return $this;

    }
}

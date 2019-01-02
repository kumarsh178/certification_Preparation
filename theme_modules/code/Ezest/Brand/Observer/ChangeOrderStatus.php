<?php

namespace Ezest\Brand\Observer;
use Magento\Sales\Model\Order;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class ChangeOrderStatus implements ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	$order = $observer->getEvent()->getOrder();
    	$orderState = Order::STATE_COMPLETE;
		$order->setState($orderState)->setStatus(Order::STATE_COMPLETE);
		$order->save();
    	$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/ChangeOrderStatus.log');
		 $logger = new \Zend\Log\Logger();
		 $logger->addWriter($writer);
		 $logger->info('ChangeOrderStatus');

	}
}
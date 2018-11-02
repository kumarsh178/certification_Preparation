<?php 
namespace Ezest\Practice\Observer;
class ChangeOrderStatus implements \Magento\Framework\Event\ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer){
			$order = $observer->getEvent()->getOrderIds();
			$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/order.log');
			$logger = new \Zend\Log\Logger();
			$logger->addWriter($writer);
			$logger->info('Order Id'.$order[0]);
		 	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$order = $objectManager->create('\Magento\Sales\Model\Order') ->load($order[0]);
			$orderState = \Magento\Sales\Model\Order::STATE_PROCESSING;
			$order->setState($orderState)->setStatus(\Magento\Sales\Model\Order::STATE_PROCESSING);
			$order->save();
	}
}
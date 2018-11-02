<?php
namespace Ezest\Checkout\Observer;
 
use Magento\Framework\Event\ObserverInterface;
 
class SetItemDropdownAttribute implements ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/quote_convert.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $quoteItem = $observer->getQuoteItem();
        $product = $observer->getProduct();
        $logger->info('value added into quote : ');
        $quoteItem->setSampleAttribute2('simple test');
       $quoteItem->save();
    }
}
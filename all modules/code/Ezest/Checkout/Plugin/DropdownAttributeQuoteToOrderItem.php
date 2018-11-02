<?php
namespace Ezest\Checkout\Plugin;
 
class DropdownAttributeQuoteToOrderItem
{
    public function aroundConvert(
        \Magento\Quote\Model\Quote\Item\ToOrderItem $subject,
        \Closure $proceed,
        \Magento\Quote\Model\Quote\Item\AbstractItem $item,
        $additional = []
    ) {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/quote_convert.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('value convert to order'.$item->getSampleAttribute2());
        /** @var $orderItem \Magento\Sales\Model\Order\Item */
        $orderItem = $proceed($item, $additional);
        $orderItem->setSampleAttribute2('olpppppppppp');
        return $orderItem;
    }
}
<?php

namespace Ezest\Brand\Model\Total;

use Magento\Store\Model\ScopeInterface;

class Extfee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    protected $helperData;

    protected $quoteValidator = null;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator,
		\Ezest\Brand\Helper\Data $helperData)
    {
        $this->quoteValidator = $quoteValidator;
        $this->helperData = $helperData;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    )
    {
        parent::collect($quote, $shippingAssignment, $total);
        if (!count($shippingAssignment->getItems())) {
            return $this;
        }

        $enabled = $this->helperData->isModuleEnabledExtfee();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmountExtfee();
        $subtotal = $total->getTotalAmount('subtotal');
        if ($enabled && $minimumOrderAmount <= $subtotal) {
            $extfee = $quote->getExtfee();
            $total->setTotalAmount('extfee', $extfee);
            $total->setBaseTotalAmount('extfee', $extfee);
            $total->setExtfee($extfee);
            $total->setBaseExtfee($extfee);
            $quote->setExtfee($extfee);
            $quote->setBaseExtfee($extfee);
            $total->setGrandTotal($total->getGrandTotal() + $extfee);
            $total->setBaseGrandTotal($total->getBaseGrandTotal() + $extfee);
        }
        return $this;
    }

    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {

        $enabled = $this->helperData->isModuleEnabledExtfee();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmountExtfee();
        $subtotal = $quote->getSubtotal();
        $extfee = $quote->getExtfee();
        if ($enabled && $minimumOrderAmount <= $subtotal && $extfee) {
            return [
                'code' => 'extfee',
                'title' => 'Extra Fee',
                'value' => $extfee
            ];
        } else {
            return array();
        }
    }

    public function getLabel()
    {
        return __('Extra Fee');
    }

    protected function clearValues(\Magento\Quote\Model\Quote\Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);

    }
}
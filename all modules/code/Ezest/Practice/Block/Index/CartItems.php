<?php
namespace Ezest\Practice\Block\Index;

class CartItems extends \Magento\Framework\View\Element\Template
{
	private $_checkoutCart;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Checkout\Model\Cart $checkout
		){
		
		parent::__construct($context);
		$this->_checkoutCart = $checkout;
	}
	public function getProducts(){
		return $this->_checkoutCart->getQuote();
	}
}
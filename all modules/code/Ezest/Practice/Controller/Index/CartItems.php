<?php
namespace Ezest\Practice\Controller\Index;

class CartItems extends \Magento\Framework\App\Action\Action
{
	private $_pageFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
			$this->_pageFactory= $pageFactory;
			return parent::__construct($context);
	}

	public function execute(){
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
		echo $totalItems = $cart->getQuote()->getItemsCount(); 
		$itemsVisible = $cart->getQuote()->getAllItems();
		foreach($itemsVisible as $items){
			echo $items->getProductId();
			echo $items->getName();
			echo '</br>';
			echo 'heloo';

		}
		exit;
		$result = $this->_pageFactory->create();
		return $result;
	}

}
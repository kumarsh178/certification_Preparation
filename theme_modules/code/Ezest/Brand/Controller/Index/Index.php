<?php

namespace Ezest\Brand\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $productRepository; 
	 public function __construct(
            \Magento\Framework\App\Action\Context $context,
            \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
          ) {
              parent::__construct($context);

              $this->productRepository = $productRepository;
          }
    public function execute()
    {
    	
            $product1 = $product = $this->productRepository->getById(1);;
            echo '<pre>';
            print_r($product1->getExtensionAttributes()->getBrandLogo()); exit;
            //echo get_class($_item);

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
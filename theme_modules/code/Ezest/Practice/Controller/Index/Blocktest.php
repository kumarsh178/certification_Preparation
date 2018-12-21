<?php

namespace Ezest\Practice\Controller\Index;

class Blocktest extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $_sitemap;
    protected $_storeManager;
    protected $_storeConfigInterface;
    protected $_usersRoles;

	public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Sitemap\Model\ResourceModel\Cms\PageFactory $sitemap,
         \Magento\Store\Model\StoreManagerInterface $storeManager,
         \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
         \Ezest\Practice\Model\UsersRoles $userRoles
        ){
			$this->_pageFactory = $pageFactory;
            $this->_storeManager = $storeManager;
            $this->_sitemap = $sitemap;
            $this->_storeConfigInterface = $scopeConfig;
            $this->_usersRoles = $userRoles;
			return parent::__construct($context);
	}
    public function execute()
    {
    	$resultPage = $this->_pageFactory->create();
	 	return $resultPage;     
    }
}
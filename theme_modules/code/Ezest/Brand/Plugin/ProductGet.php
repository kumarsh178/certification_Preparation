<?php 
namespace Ezest\Brand\Plugin;
use Magento\Catalog\Api\Data\ProductInterface;

class ProductGet
{
	protected $productExtensionFactory;
	protected $productFactory;
	protected $_brandModel;
	protected $_storeManagerInterface;

	public function __construct(
		\Magento\Catalog\Api\Data\ProductExtensionFactory $productExtensionFactory,
		\Magento\Catalog\Model\ProductFactory $productFactory,
		\Ezest\Brand\Model\Brand $brandModel,
		\Magento\Store\Model\StoreManagerInterface $storeManagerInterface
	){
		$this->productFactory = $productFactory;
		$this->productExtensionFactory = $productExtensionFactory;
		$this->_brandModel = $brandModel;
		$this->_storeManagerInterface = $storeManagerInterface;
	}
	public function aroundGetById(\Magento\Catalog\Api\ProductRepositoryInterface $subject, \Closure $proceed, $customerId){
		$product = $proceed($customerId);

        //if extension attribute is already set, return early.
        if($product->getExtensionAttributes() && $product->getExtensionAttributes()->getBrandLogo()) {
            return $product;
        }

        //In the event that extension attribute class has not be instantiated yet, we create it ourselves.
        if(!$product->getExtensionAttributes()) {
            $productExtension = $this->productExtensionFactory->create();
            $prodcuct->setExtensionAttributes($productExtension);
        }

        //Fetch the raw product model, and set the data onto our attribute.
        $productModel = $this->productFactory->create()->load($product->getId());
        $brand = $this->_brandModel->load($productModel->getData('sample_attribute2'));
        $brandImage = $this->_storeManagerInterface->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).$brand->getBrandImage();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/brandLogo.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info('Brand LOgo : '.$productModel->getData('sample_attribute2'));
		$logger->info($brandImage);
        $product->getExtensionAttributes()->setBrandLogo($brandImage);

        return $product;
	}

}
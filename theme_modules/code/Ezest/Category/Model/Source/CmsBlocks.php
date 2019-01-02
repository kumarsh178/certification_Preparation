<?php 
namespace Ezest\Category\Model\Source;
class CmsBlocks extends  \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
	private $_cmsCollection;
	private $_blockRepositoryInterface;
	private $_searchCriteriaInterface;

	public function __construct(\Magento\Cms\Api\BlockRepositoryInterface $blockRepositoryInterface,
		\Magento\Framework\Api\SearchcriteriaBuilder $searchCriteriaInterface){
		$this->_blockRepositoryInterface = $blockRepositoryInterface;
		$this->_searchCriteriaInterface = $searchCriteriaInterface;

	}
	public function getAllOptions(){
		$searchFilter = $this->_searchCriteriaInterface->addFilter('is_active',array('eq'=>1))->create();
		$blockCollection = $this->_blockRepositoryInterface->getList($searchFilter)->getItems();
		$items = array();
		$items[] = array('label'=>'Select Block','value'=>'');
		foreach($blockCollection as $item){
				$items[] = array('label'=>$item->getTitle(),'value'=>$item->getId());
		}
		return $items;

	}
}
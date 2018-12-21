<?php
namespace Ezest\Brand\Model\ResourceModel;

class Brand extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('brand', 'entity_id');
    }
}
?>
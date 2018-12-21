<?php

namespace Ezest\Brand\Model\ResourceModel\Brand;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ezest\Brand\Model\Brand', 'Ezest\Brand\Model\ResourceModel\Brand');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>
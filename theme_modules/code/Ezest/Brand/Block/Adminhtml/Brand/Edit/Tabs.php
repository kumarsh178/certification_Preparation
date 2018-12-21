<?php
namespace Ezest\Brand\Block\Adminhtml\Brand\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('brand_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Brand Information'));
    }
}
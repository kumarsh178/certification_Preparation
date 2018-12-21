<?php

namespace Ezest\Brand\Block\Adminhtml\Sales\Order\Creditmemo;

class Totals extends \Magento\Framework\View\Element\Template {

	protected $_creditmemo = null;

	protected $_source;

	protected $_dataHelper;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Ezest\Brand\Helper\Data $dataHelper,
		array $data = []
		) {
		$this -> _dataHelper = $dataHelper;
		parent :: __construct($context, $data);
	} 

	public function getSource() {
		return $this -> getParentBlock() -> getSource();
	} 

	public function getCreditmemo() {
		return $this -> getParentBlock() -> getCreditmemo();
	} 

	public function initTotals() {

		$this -> getParentBlock();
		$this -> getCreditmemo();
		$this -> getSource();

		
		if ($this -> getSource() -> getExtfee()) {
		$total = new \Magento\Framework\DataObject([
			'code' => 'extfee',
		    'strong' => false,
			'value' => $this -> getSource() -> getExtfee(),
			'label' => $this -> _dataHelper -> getFeeLabelExtfee(),
			]
			);
		$this -> getParentBlock() -> addTotalBefore($total, 'grand_total');
		}
	

		return $this;
	} 
} 

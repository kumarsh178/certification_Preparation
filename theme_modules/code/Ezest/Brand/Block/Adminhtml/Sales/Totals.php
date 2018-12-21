<?php

namespace Ezest\Brand\Block\Adminhtml\Sales;

class Totals extends \Magento\Framework\View\Element\Template {

	protected $_dataHelper;

	protected $_currency;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Ezest\Brand\Helper\Data $dataHelper,
		\Magento\Directory\Model\Currency $currency,
		array $data = []
		) {
		parent :: __construct($context, $data);
		$this -> _dataHelper = $dataHelper;
		$this -> _currency = $currency;
	} 

	public function getOrder() {
		return $this -> getParentBlock() -> getOrder();
	} 

	public function getSource() {
		return $this -> getParentBlock() -> getSource();
	} 

	public function getCurrencySymbol() {
		return $this -> _currency -> getCurrencySymbol();
	} 

	public function initTotals() {
		$this -> getParentBlock();
		$this -> getOrder();
		$this -> getSource();

		
		if ($this -> getSource() -> getExtfee()) {
			$total = new \Magento\Framework\DataObject([
				'code' => 'extfee',
				'value' => $this -> getSource() -> getExtfee(),
				'label' => $this -> _dataHelper -> getFeeLabelExtfee(),
				]
				);
			$this -> getParentBlock() -> addTotalBefore($total, 'grand_total');
		} 
	

		return $this;
	} 
} 

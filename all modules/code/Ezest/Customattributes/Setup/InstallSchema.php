<?php
namespace Ezest\Customattributes\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){

		$installer= $setup;
		$installer->startSetup();
		$eavTable = $installer->getTable('quote_address'); 
		$columns = [
				'property_type'=>[
				'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'nullable'=>false,
				'comment'=>'Select Commercial and residencial',

				]
			];
			$connection = $installer->getConnection();
		    foreach ($columns as $name => $definition) {
		        $connection->addColumn($eavTable, $name, $definition);
		    }

		    $installer->endSetup();

	}
}
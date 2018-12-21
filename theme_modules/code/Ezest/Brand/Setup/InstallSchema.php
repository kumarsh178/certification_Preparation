<?php

namespace Ezest\Brand\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){

		$installer->run('create table brand(entity_id int not null auto_increment, name varchar(100), 
brand_image varchar(255),
status int(5),
primary key(entity_id))');


		//demo 
//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$scopeConfig = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface');
//$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/updaterates.log');
//$logger = new \Zend\Log\Logger();
//$logger->addWriter($writer);
//$logger->info('updaterates');
//demo 

		}

        $installer->endSetup();

    }
}
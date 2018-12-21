<?php

namespace Ezest\Brand\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $quoteAddressTable = 'quote_address';
        $quoteTable = 'quote';
        $orderTable = 'sales_order';
        $invoiceTable = 'sales_invoice';
        $creditmemoTable = 'sales_creditmemo';

		
        //Quote address tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteAddressTable),
                'extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Extfee'
                ]
            );
        $setup->getConnection()
            ->addColumn(
              $setup->getTable($quoteAddressTable),
                'base_extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Base Extfee'
                ]
            );
        //Quote tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteTable),
                'extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Extfee'

                ]
            );

        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteTable),
                'base_extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Base Extfee'

                ]
            );
        //Order tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($orderTable),
                'extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Extfee'

                ]
            );

         $setup->getConnection()
             ->addColumn(
                $setup->getTable($orderTable),
                'base_extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Base Extfee'

                ]
            );
        //Invoice tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($invoiceTable),
                'extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Extfee'

                ]
            );
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($invoiceTable),
                'base_extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Base Extfee'

                ]
            );
        //Credit memo tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($creditmemoTable),
                'extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Extfee'

                ]
            );
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($creditmemoTable),
                'base_extfee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'length'=>'12,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Base Extfee'

                ]
            );


        $setup->endSetup();
    }
}

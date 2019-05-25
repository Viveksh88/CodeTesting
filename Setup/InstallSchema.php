<?php
/**
 * Copyright © 2015 Excellence. All rights reserved.
 */

namespace Excellence\PushNotification\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

		/**
         * Create table 'pushnotification_notification'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('pushnotification_notification')
        )
        ->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'pushnotification_notification'
        )
        ->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'name'
        )
        ->addColumn(
            'store_view',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'store_view'
        )
        ->addColumn(
            'template',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'template'
        )
        ->addColumn(
            'trigger_type',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'trigger_type'
        )
        ->addColumn(
            'trigger_event',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'trigger_event'
        )
        ->addColumn(
            'schedule_event',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'schedule_event'
        )
        ->addColumn(
            'custom_period',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'custom_period'
        )
        ->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'status'
        )
        ->setComment(
            'Excellence PushNotification pushnotification_notification'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();

    }
}

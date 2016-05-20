<?php
namespace Excellence\Table\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff
         
//START table setup
$table = $installer->getConnection()->newTable(
            $installer->getTable('excellence_user')
    )->addColumn(
            'excellence_table_test_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Entity ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Title'
        )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Email'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT, ],
            'Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE, ],
            'Modification Time'
        );
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()->newTable(
            $installer->getTable('excellence_table_test1')
    )->addColumn('user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [  'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true,],
            'Primary ID'
        )->addColumn('excellence_table_test1_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [  'nullable' => false,],
            'User ID'
        )->addColumn(
           'is_active',
           \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [ 'nullable' => false,],
            'Is Active'
        );
        $installer->getConnection()->createTable($table);
        
//START table setup

//END   table setup
$installer->endSetup();
    }
}

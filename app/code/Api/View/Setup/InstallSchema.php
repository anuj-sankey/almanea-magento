<?php
namespace Api\View\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    
  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
  {
      
    $UserTableName = $setup->getTable('UserTable');

    if($setup->getConnection()->isTableExists($UserTableName) != true) {

      $userTable = $setup->getConnection()
          ->newTable($UserTableName)
          ->addColumn(
              'user_id',
              \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
              null,
              ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
              'User ID'
          )
          ->addColumn(
              'name',
              \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
              255,
              ['nullable' => false, 'default' => ''],
                'Name'
          )
          ->addColumn(
              'username',
              \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
              null,
              ['nullable' => false, 'default' => ''],
                'Username'
          )
          ->addIndex(
            $setup->getIdxName('UserTable', ['user_id']),
            ['user_id']
          )
          ->setComment("Users Table");

      $setup->getConnection()->createTable($userTable);
    }
  }
}
?>

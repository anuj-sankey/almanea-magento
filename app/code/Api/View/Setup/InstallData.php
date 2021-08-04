<?php
namespace Api\View\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $data;

    public function __construct()
    {}


    

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataUserRows = [
            [
                'name' => 'Anuj',
                'username' => 'Anuj.More',

            ],
            [
                'name' => 'Anish',
                'username' => 'Anish.More',

            ],
        ];

        foreach ($dataUserRows as $data) {
            $setup->getConnection()->insert($setup->getTable('UserTable'), $data);
        }

    echo $name;
    }
}



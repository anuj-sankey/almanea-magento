<?php
namespace DbIntegration\Test\Model;

use DbIntegration\Test\Api\TestInterface;

class Test implements TestInterface
{

    /**
     * {@inheritdoc}
     */
    public function setData($data)
    {

   
   
        $name = $data['name'];
        $number = $data['number'];
        $city = $data['city'];

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('test_table');

        $sql = "Insert Into " . $tableName . " (name, number, city) Values ('" . $name . "','" . $number . "','" . $city . "')";
        $connection->query($sql);
        // return 'successfully saved';
        return $data;

    }
}

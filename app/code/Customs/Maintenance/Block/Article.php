<?php
namespace Customs\Maintenance\Block;

use \Magento\Framework\View\Element\Template;

class Article extends Template
{
    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data =[]
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return Post[]
     */
    public function getArticles($customer_name,
        $problem_description,
        $scheduled_date,
        $scheduled_time) {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('schedule_maintenance');

        $sql = "Insert Into " . $tableName . " (customer_name, problem_description, date,time) Values ('" . $customer_name . "','" . $problem_description . "','" . $scheduled_date . "','" . $scheduled_time . "')";
        $connection->query($sql);
        return 'successfully saved';

    }

    // public function setData()
    // {

    // $name = $data['name'];
    // $number = $data['number'];
    // $city = $data['city'];

    // }
}

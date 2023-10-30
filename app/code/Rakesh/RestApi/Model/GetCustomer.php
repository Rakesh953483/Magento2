<?php

namespace Rakesh\RestApi\Model;

use Rakesh\RestApi\Api\GetCustomerInterface;

class GetCustomer implements GetCustomerInterface
{

    /**
     * {@inheritdoc}
     */

    public function getData()
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('sales_order');

        $select = $connection->select()
            ->from(
                ['p' => $tableName]
            );

        $data = $connection->fetchAll($select);
        // print '<pre>';
        // print_r($data);
        // die();
        return $data;
    }

    public function postData()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('sales_order');

        $select = $connection->select()
            ->from(
                ['p' => $tableName]
            );

        $datas = $connection->fetchAll($select);
        // foreach ($datas as $data) {
        $sql = "UPDATE $tableName SET `state`='new', `status` = 'pending' WHERE `entity_id`=1";
        $connection->query($sql);
        $latestData = $this->getData();
        return $latestData;
        // return 'Data updated successfully';
        // }
    }
}

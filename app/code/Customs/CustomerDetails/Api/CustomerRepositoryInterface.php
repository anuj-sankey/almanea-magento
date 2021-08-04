<?php
namespace Customs\CustomerDetails\Api;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Rest Api to get product ID
 *
 */

interface CustomerRepositoryInterface
{

    /**
     * Get product by its ID
     *
     * @param int $id
     * @return \Customs\CustomerDetails\Api\Data\CustomerInterface
     * @throws NoSuchEntityException
     *
     */

    public function getCustomerById($id);
}

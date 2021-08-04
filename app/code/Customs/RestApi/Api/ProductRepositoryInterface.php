<?php
namespace Customs\RestApi\Api;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Rest Api to get product ID
 *
 */

interface ProductRepositoryInterface
{

    /**
     * Get product by its ID
     *
     * @param int $id
     * @return \Customs\RestApi\Api\Data\ProductInterface
     * @throws NoSuchEntityException
     *
     */

    public function getProductById($id);
}

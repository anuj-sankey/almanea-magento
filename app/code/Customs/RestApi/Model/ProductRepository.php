<?php

namespace Customs\RestApi\Model;

use Customs\RestApi\Api\Data\ProductInterfaceFactory;
use Customs\RestApi\Api\ProductRepositoryInterface;
use Customs\RestApi\Helper\ProductHelper;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * RestApi to get product ID
 */

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @var ProductInterfaceFactory
     */
    private $productInterfaceFactory;

    /**
     * @var ProductHelper
     */
    private $productHelper;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductRepository constructor
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param ProductInterfaceFactory $productInterfaceFactory
     * @param ProductHelper $productHelper
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        ProductInterfaceFactory $productInterfaceFactory,
        ProductHelper $productHelper
    ) {
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->productHelper = $productHelper;
        $this->productRepository = $productRepository;

    }

    /**
     * Get product by its ID
     *
     * @params int $id
     * @return \Customs\RestApi\Api\Data\ProductInterface
     * @throws NoSuchEntityException
     */

    public function getProductById($id)
    {
        /**
         * @var \Customs\RestApi\Api\Data\ProductInterface $productInterface
         */
        $productInterface = $this->productInterfaceFactory->create();
        try {
            /**
             * @var \Magento\Catalog\Api\Data\ProductInterface $product
             */
            $product = $this->productRepository->getById($id);
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setDescription($product->getDescription() ? $product->getDescription() : "......");
            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
            $productInterface->setImages($this->productHelper->getProductImagesArray($product));

            return $productInterface;

        } catch (NoSuchEntityException $e) {
            throw NoSuchEntityException::singleField("id", $id);
        }

    }

}

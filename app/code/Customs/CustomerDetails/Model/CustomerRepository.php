<?php

namespace Customs\CustomerDetails\Model;

use Customs\CustomerDetails\Api\Data\CustomerInterfaceFactory;
use Customs\CustomerDetails\Api\CustomerRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;


class CustomerRepository implements CustomerRepositoryInterface
{

    /**
     * @var CustomerInterfaceFactory
     */
    private $CustomerInterfaceFactory;



    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $CustomerRepository;

    /**
     * CustomerRepository constructor
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $CustomerRepository
     * @param CustomerInterfaceFactory $CustomerInterfaceFactory

     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $CustomerRepository,
        CustomerInterfaceFactory $CustomerInterfaceFactory
    ) {
        $this->CustomerInterfaceFactory = $CustomerInterfaceFactory;
  
        $this->CustomerRepository = $CustomerRepository;

    }

    /**
     * Get Customer by its ID
     *
     * @params int $id
     * @return \Customs\CustomerDetails\Api\Data\CustomerInterface
     * @throws NoSuchEntityException
     */

    public function getCustomerById($id)
    {
        /**
         * @var \Customs\RestApi\Api\Data\CustomerInterface $CustomerInterface
         */
        $CustomerInterface = $this->CustomerInterfaceFactory->create();
        try {
            /**
             * @var \Magento\Customer\Api\Data\CustomerInterface $Customer
             */
            $Customer = $this->CustomerRepository->getById($id);
            $CustomerInterface->setId($Customer->getId());
            $CustomerInterface->setFirstName($Customer->getFirstName());
            $CustomerInterface->setEmail($Customer->getEmail());
            $CustomerInterface->setCreatedAt($Customer->getCreatedAt());
            return $CustomerInterface;

        } catch (NoSuchEntityException $e) {
            throw NoSuchEntityException::singleField("id", $id);
        }

    }

}

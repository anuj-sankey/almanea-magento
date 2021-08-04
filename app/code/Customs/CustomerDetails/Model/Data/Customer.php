<?php
namespace Customs\CustomerDetails\Model\Data;

use Customs\CustomerDetails\Api\Data\CustomerInterface;
use Magento\Framework\DataObject;

class Customer extends DataObject implements CustomerInterface
{

    //Getters

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData('firstname');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getData('email');
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    // ############################################################################

    //Setter

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname)
    {
        return $this->setData('firstname', $firstname);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData('email', $email);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData('created_at', $created_at);
    }

    //Setters Ended
    //----------------------------------------------
}

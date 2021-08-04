<?php

namespace Customs\CustomerDetails\Api\Data;

interface CustomerInterface
{

    //Getters

    /**
     * @return int
     */
    public function getId();

    // /**
    //  * @return int
    //  */
    // public function getConfirmation();

    // /**
    //  * @return string
    //  */
    // public function getCreatedAt();
    // /**
    //  * @return string
    //  */
    // public function getUpdatedAt();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getEmail();

    // ############################################################################

    //Setters
    /**
     * @param int $id
     * @return $this
     */

    public function setId($id);

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @param string $created_at
     * @return $this
     */

    public function setCreatedAt($created_at);

    //Getters Ended
    //---------

}

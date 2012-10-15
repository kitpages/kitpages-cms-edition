<?php
namespace App\UserBundle\Entity;

use FOS\UserBundle\Entity\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

class Group extends BaseGroup
{
    protected $id;


    public function __toString() {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var App\UserBundle\Entity\User
     */
    private $userList;

    public function __construct()
    {
        $this->userList = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userList
     *
     * @param App\UserBundle\Entity\User $userList
     */
    public function addUser(\App\UserBundle\Entity\User $userList)
    {
        $this->userList[] = $userList;
    }

    /**
     * Get userList
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserList()
    {
        return $this->userList;
    }
}
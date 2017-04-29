<?php

namespace Compo\CollaboratorBundle\Entity;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
/**
 * Group
 */
class Group extends BaseGroup
{
    /**
     * @var integer
     */
    protected $id;




    public function __construct($roles = array())
    {
        $this->roles = $roles;
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

    public function __toString()
    {

        return $this->getName() ?: '';
    }
}

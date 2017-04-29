<?php

namespace Compo\CollaboratorBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/*
 * Collaborator
 *
 * @ORM\Entity
 * @ORM\Table(name="Collaborator")
 */

class Collaborator extends BaseUser
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $secondname;

    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $salary;

    /**
     * @var string
     */
     /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var boolean
    */

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    private $newPass;


    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        parent::__construct();
        // your own logic
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Collaborator
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }
    /**
     * Get all Groups added to the administrator
     * @return ArrayCollection $groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add Group $group to the administrator
     *
     * @param \Group $group
     * @return void
     */
    public function addGroup(\FOS\UserBundle\Model\GroupInterface $group)
    {
        if (!$this->groups->contains($group)) {
            $this->groups->add($group);
        }
    }
    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set secondname
     *
     * @param string $secondname
     *
     * @return Collaborator
     */
    public function setSecondname($secondname)
    {
        $this->secondname = $secondname;

        return $this;
    }

    /**
     * Get secondname
     *
     * @return string
     */
    public function getSecondname()
    {
        return $this->secondname;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Collaborator
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set salary
     *
     * @param string $salary
     *
     * @return Collaborator
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    public function getNewPass() {

        return $this->newPass;

    }

    public function setNewPass($newPass)
    {

        $this->newPass = $newPass; return $this;

    }

    /**
     * Get salary
     *
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }




   /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Collaborator
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Collaborator
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if(!$this->getCreatedAt()) {
            $this->created_at = new \DateTime();
        }
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
    /**
     * @var \Compo\DepartmentBundle\Entity\Department
     */
    private $department;


    /**
     * Set department
     *
     * @param \Compo\DepartmentBundle\Entity\Department $department
     * @return \Compo\DepartmentBundle\Entity\Department
     */
    public function setDepartment(\Compo\DepartmentBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \Compo\DepartmentBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }
}

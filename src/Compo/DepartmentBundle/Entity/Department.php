<?php

namespace Compo\DepartmentBundle\Entity;

/**
 * Department
 */
class Department
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $header;


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
     * Set header
     *
     * @param string $header
     *
     * @return Department
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    public function __toString()
    {

        return $this->getHeader() ?: '';
    }
}


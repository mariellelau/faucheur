<?php

namespace FaucheurBundle\Entity;

/**
 * Role
 */
class Role
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nomRole;

    /**
     * @var \FaucheurBundle\Entity\Action
     */
    private $idRole;


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
     * Set nomRole
     *
     * @param string $nomRole
     *
     * @return RoleAction
     */
    public function setNomRole($nomRole)
    {
        $this->nomRole = $nomRole;

        return $this;
    }

    /**
     * Get nomRole
     *
     * @return string
     */
    public function getNomRole()
    {
        return $this->nomRole;
    }

    /**
     * Set idRole
     *
     * @param \FaucheurBundle\Entity\Action $idRole
     *
     * @return RoleAction
     */
    public function setIdRole(\FaucheurBundle\Entity\Action $idRole = null)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole
     *
     * @return \FaucheurBundle\Entity\Action
     */
    public function getIdRole()
    {
        return $this->idRole;
    }
}

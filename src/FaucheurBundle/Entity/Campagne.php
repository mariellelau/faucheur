<?php

namespace FaucheurBundle\Entity;

/**
 * Campagne
 */
class Campagne
{
    public function __toString()
    {
        return $this->nom;
    }


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $actions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Campagne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add action
     *
     * @param \FaucheurBundle\Entity\Action $action
     *
     * @return Campagne
     */
    public function addAction(\FaucheurBundle\Entity\Action $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    /**
     * Remove action
     *
     * @param \FaucheurBundle\Entity\Action $action
     */
    public function removeAction(\FaucheurBundle\Entity\Action $action)
    {
        $this->actions->removeElement($action);
    }

    /**
     * Get actions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActions()
    {
        return $this->actions;
    }
}

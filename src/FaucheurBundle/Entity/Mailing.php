<?php

namespace FaucheurBundle\Entity;

/**
 * Mailing
 */
class Mailing
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \FaucheurBundle\Entity\Militant
     */
    private $email;


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
     * @return Mailing
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
     * Set email
     *
     * @param \FaucheurBundle\Entity\Militant $email
     *
     * @return Mailing
     */
    public function setEmail(\FaucheurBundle\Entity\Militant $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \FaucheurBundle\Entity\Militant
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $militants;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->militants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add militant
     *
     * @param \FaucheurBundle\Entity\Militant $militant
     *
     * @return Mailing
     */
    public function addMilitant(\FaucheurBundle\Entity\Militant $militant)
    {
        $this->militants[] = $militant;

        return $this;
    }

    /**
     * Remove militant
     *
     * @param \FaucheurBundle\Entity\Militant $militant
     */
    public function removeMilitant(\FaucheurBundle\Entity\Militant $militant)
    {
        $this->militants->removeElement($militant);
    }

    /**
     * Get militants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMilitants()
    {
        return $this->militants;
    }
}

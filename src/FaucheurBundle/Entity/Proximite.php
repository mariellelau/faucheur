<?php

namespace FaucheurBundle\Entity;

/**
 * Proximite
 */
class Proximite
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
    private $militant;


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
     * @return Proximite
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
     * Set militant
     *
     * @param \FaucheurBundle\Entity\Militant $militant
     *
     * @return Proximite
     */
    public function setMilitant(\FaucheurBundle\Entity\Militant $militant = null)
    {
        $this->militant = $militant;

        return $this;
    }

    /**
     * Get militant
     *
     * @return \FaucheurBundle\Entity\Militant
     */
    public function getMilitant()
    {
        return $this->militant;
    }
}

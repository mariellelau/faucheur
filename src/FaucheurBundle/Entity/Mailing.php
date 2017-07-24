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
}

<?php

namespace FaucheurBundle\Entity;

/**
 * Competence
 */
class Competence
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
     * @var string
     */
    private $detail;

    /**
     * @var \FaucheurBundle\Entity\Aptitude
     */
    private $aptitude;


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
     * @return Competence
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
     * Set detail
     *
     * @param string $detail
     *
     * @return Competence
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set aptitude
     *
     * @param \FaucheurBundle\Entity\Aptitude $aptitude
     *
     * @return Competence
     */
    public function setAptitude(\FaucheurBundle\Entity\Aptitude $aptitude = null)
    {
        $this->aptitude = $aptitude;

        return $this;
    }

    /**
     * Get aptitude
     *
     * @return \FaucheurBundle\Entity\Aptitude
     */
    public function getAptitude()
    {
        return $this->aptitude;
    }
}

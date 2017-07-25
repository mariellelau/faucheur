<?php

namespace FaucheurBundle\Entity;

/**
 * Aptitude
 */
class Aptitude
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $niveau;

    /**
     * @var \FaucheurBundle\Entity\Militant
     */
    private $militant;

    /**
     * @var \FaucheurBundle\Entity\Competence
     */
    private $competence;


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
     * Set niveau
     *
     * @param integer $niveau
     *
     * @return Aptitude
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set militant
     *
     * @param \FaucheurBundle\Entity\Militant $militant
     *
     * @return Aptitude
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

    /**
     * Set competence
     *
     * @param \FaucheurBundle\Entity\Competence $competence
     *
     * @return Aptitude
     */
    public function setCompetence(\FaucheurBundle\Entity\Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \FaucheurBundle\Entity\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $aptitude;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aptitude = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add aptitude
     *
     * @param \FaucheurBundle\Entity\Aptitude $aptitude
     *
     * @return Aptitude
     */
    public function addAptitude(\FaucheurBundle\Entity\Aptitude $aptitude)
    {
        $this->aptitude[] = $aptitude;

        return $this;
    }

    /**
     * Remove aptitude
     *
     * @param \FaucheurBundle\Entity\Aptitude $aptitude
     */
    public function removeAptitude(\FaucheurBundle\Entity\Aptitude $aptitude)
    {
        $this->aptitude->removeElement($aptitude);
    }

    /**
     * Get aptitude
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAptitude()
    {
        return $this->aptitude;
    }
}

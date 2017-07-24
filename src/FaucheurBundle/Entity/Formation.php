<?php

namespace FaucheurBundle\Entity;

/**
 * Formation
 */
class Formation
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
    private $type;

    /**
     * @var \DateTime
     */
    private $dateDebut;

    /**
     * @var string
     */
    private $duree;

    /**
     * @var string
     */
    private $lieu;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var \FaucheurBundle\Entity\Militant
     */
    private $militant;

    /**
     * @var \FaucheurBundle\Entity\Campagne
     */
    private $campagne;


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
     * @return Formation
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
     * Set type
     *
     * @param string $type
     *
     * @return Formation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Formation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set duree
     *
     * @param string $duree
     *
     * @return Formation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Formation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Formation
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set militant
     *
     * @param \FaucheurBundle\Entity\Militant $militant
     *
     * @return Formation
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
     * Set campagne
     *
     * @param \FaucheurBundle\Entity\Campagne $campagne
     *
     * @return Formation
     */
    public function setCampagne(\FaucheurBundle\Entity\Campagne $campagne = null)
    {
        $this->campagne = $campagne;

        return $this;
    }

    /**
     * Get campagne
     *
     * @return \FaucheurBundle\Entity\Campagne
     */
    public function getCampagne()
    {
        return $this->campagne;
    }
}

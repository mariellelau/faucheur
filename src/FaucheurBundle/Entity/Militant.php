<?php

namespace FaucheurBundle\Entity;

/**
 * Militant
 */
class Militant
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
    private $prenom;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var integer
     */
    private $codePostal;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $proximite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $actions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $aptitudes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proximite = new \Doctrine\Common\Collections\ArrayCollection();
        $this->actions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aptitudes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Militant
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Militant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Militant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Militant
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Militant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Militant
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Militant
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Militant
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Militant
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Militant
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
     * Add proximite
     *
     * @param \FaucheurBundle\Entity\Proximite $proximite
     *
     * @return Militant
     */
    public function addProximite(\FaucheurBundle\Entity\Proximite $proximite)
    {
        $this->proximite[] = $proximite;

        return $this;
    }

    /**
     * Remove proximite
     *
     * @param \FaucheurBundle\Entity\Proximite $proximite
     */
    public function removeProximite(\FaucheurBundle\Entity\Proximite $proximite)
    {
        $this->proximite->removeElement($proximite);
    }

    /**
     * Get proximite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProximite()
    {
        return $this->proximite;
    }

    /**
     * Add action
     *
     * @param \FaucheurBundle\Entity\Action $action
     *
     * @return Militant
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

    /**
     * Add aptitude
     *
     * @param \FaucheurBundle\Entity\Aptitude $aptitude
     *
     * @return Militant
     */
    public function addAptitude(\FaucheurBundle\Entity\Aptitude $aptitude)
    {
        $this->aptitudes[] = $aptitude;

        return $this;
    }

    /**
     * Remove aptitude
     *
     * @param \FaucheurBundle\Entity\Aptitude $aptitude
     */
    public function removeAptitude(\FaucheurBundle\Entity\Aptitude $aptitude)
    {
        $this->aptitudes->removeElement($aptitude);
    }

    /**
     * Get aptitudes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAptitudes()
    {
        return $this->aptitudes;
    }

    /**
     * Add formation
     *
     * @param \FaucheurBundle\Entity\Formation $formation
     *
     * @return Militant
     */
    public function addFormation(\FaucheurBundle\Entity\Formation $formation)
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \FaucheurBundle\Entity\Formation $formation
     */
    public function removeFormation(\FaucheurBundle\Entity\Formation $formation)
    {
        $this->formations->removeElement($formation);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }
    /**
     * @var string
     */
    private $telephone;


    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Militant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $associations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $aptitude;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $role;


    /**
     * Set proximite
     *
     * @param \FaucheurBundle\Entity\Proximite $proximite
     *
     * @return Militant
     */
    public function setProximite(\FaucheurBundle\Entity\Proximite $proximite = null)
    {
        $this->proximite = $proximite;

        return $this;
    }

    /**
     * Add association
     *
     * @param \FaucheurBundle\Entity\Association $association
     *
     * @return Militant
     */
    public function addAssociation(\FaucheurBundle\Entity\Association $association)
    {
        $this->associations[] = $association;

        return $this;
    }

    /**
     * Remove association
     *
     * @param \FaucheurBundle\Entity\Association $association
     */
    public function removeAssociation(\FaucheurBundle\Entity\Association $association)
    {
        $this->associations->removeElement($association);
    }

    /**
     * Get associations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssociations()
    {
        return $this->associations;
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

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Add role
     *
     * @param \FaucheurBundle\Entity\Role $role
     *
     * @return Militant
     */
    public function addRole(\FaucheurBundle\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \FaucheurBundle\Entity\Role $role
     */
    public function removeRole(\FaucheurBundle\Entity\Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRole()
    {
        return $this->role;
    }
}

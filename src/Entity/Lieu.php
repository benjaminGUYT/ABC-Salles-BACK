<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LieuRepository")
 * @ApiResource
 */
class Lieu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom du lieu est obligatoire à sa création")
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="L'adresse du lieu est obligatoire à sa création")
     */
    private $adresse;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $nom_resp;

    /**
     * @ORM\Column(type="text")
     */
    private $prenom_resp;

    /**
     * @ORM\Column(type="text")
     */
    private $tel_resp;

    /**
     * @ORM\Column(type="text")
     */
    private $email_resp;

    /**
     * @ORM\Column(type="integer")
     */
    private $capa_min;

    /**
     * @ORM\Column(type="integer")
     */
    private $capa_max;

    public function __construct() {
        //TODO OR NOT TODO
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of nom_resp
     */ 
    public function getNomResp()
    {
        return $this->nom_resp;
    }

    /**
     * Set the value of nom_resp
     *
     * @return  self
     */ 
    public function setNomResp($nom_resp)
    {
        $this->nom_resp = $nom_resp;

        return $this;
    }

    /**
     * Get the value of prenom_resp
     */ 
    public function getPrenomResp()
    {
        return $this->prenom_resp;
    }

    /**
     * Set the value of prenom_resp
     *
     * @return  self
     */ 
    public function setPrenomResp($prenom_resp)
    {
        $this->prenom_resp = $prenom_resp;

        return $this;
    }

    /**
     * Get the value of tel_resp
     */ 
    public function getTelResp()
    {
        return $this->tel_resp;
    }

    /**
     * Set the value of tel_resp
     *
     * @return  self
     */ 
    public function setTelResp($tel_resp)
    {
        $this->tel_resp = $tel_resp;

        return $this;
    }



    /**
     * Get the value of email_resp
     */ 
    public function getEmailResp()
    {
        return $this->email_resp;
    }

    /**
     * Set the value of email_resp
     *
     * @return  self
     */ 
    public function setEmailResp($email_resp)
    {
        $this->email_resp = $email_resp;

        return $this;
    }

    /**
     * Get the value of capa_min
     */ 
    public function getCapaMin()
    {
        return $this->capa_min;
    }

    /**
     * Set the value of capa_min
     *
     * @return  self
     */ 
    public function setCapaMin($capa_min)
    {
        $this->capa_min = $capa_min;

        return $this;
    }

    /**
     * Get the value of capa_max
     */ 
    public function getCapaMax()
    {
        return $this->capa_max;
    }

    /**
     * Set the value of capa_max
     *
     * @return  self
     */ 
    public function setCapaMax($capa_max)
    {
        $this->capa_max = $capa_max;

        return $this;
    }
}
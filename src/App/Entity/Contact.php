<?php


namespace App\Entity;


class Contact
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $nom
     */
    private $nom;

    /**
     * @var string $prenom
     */
    private $prenom;

    /**
     * @var string $tel
     */
    private $tel;

    /**
     * private string $mel
     */
    private $mel;

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMel()
    {
        return $this->mel;
    }

    /**
     * @param mixed $mel
     * @return Contact
     */
    public function setMel($mel)
    {
        $this->mel = $mel;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



}
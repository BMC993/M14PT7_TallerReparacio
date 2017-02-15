<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="TallerReparacio\BackendBundle\Repository\ClientsRepository")
 */
class Clients
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NIF", type="string", length=10, unique=true)
     */
    private $nIF;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom", type="string", length=255)
     */
    private $cognom;

 /**
     * @ORM\OneToOne(targetEntity="Vehicles", inversedBy="clients")
     * @ORM\JoinColumn(name="vehicles_matricula", referencedColumnName="matricula")
     */
    protected $vehicle;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nIF
     *
     * @param string $nIF
     *
     * @return Clients
     */
    public function setNIF($nIF)
    {
        $this->nIF = $nIF;

        return $this;
    }

    /**
     * Get nIF
     *
     * @return string
     */
    public function getNIF()
    {
        return $this->nIF;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Clients
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
     * Set cognom
     *
     * @param string $cognom
     *
     * @return Clients
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get cognom
     *
     * @return string
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Clients
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

     /**
     * Get vehicle
     *
     * @return integer
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

     /**
     * Set vehicle
     *
     * @param integer $vehicle
     *
     * @return Vehicle
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}


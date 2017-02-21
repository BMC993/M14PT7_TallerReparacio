<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicles
 *
 * @ORM\Table(name="vehicles")
 * @ORM\Entity(repositoryClass="TallerReparacio\BackendBundle\Repository\VehiclesRepository")
 */
class Vehicles
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
     * @ORM\Column(name="matricula", type="string", length=255, unique=true)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @ORM\OneToOne(targetEntity="Clients", inversedBy="vehicles")
     * @ORM\JoinColumn(name="clients_nif", referencedColumnName="NIF")
     */
    protected $vehicle;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var int
     *
     * @ORM\Column(name="tipusCombustible", type="integer")
     */
    private $tipusCombustible;

    /**
     * @ORM\ManyToMany(targetEntity="realitzades", mappedBy="vehicle")
     */
    protected $realitzades;


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
     * Set matricula
     *
     * @param string $matricula
     *
     * @return Vehicles
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Vehicles
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Vehicles
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set tipusCombustible
     *
     * @param integer $tipusCombustible
     *
     * @return Vehicles
     */
    public function setTipusCombustible($tipusCombustible)
    {
        $this->tipusCombustible = $tipusCombustible;

        return $this;
    }

    /**
     * Get tipusCombustible
     *
     * @return int
     */
    public function getTipusCombustible()
    {
        return $this->tipusCombustible;
    }

    /**
     * Get realitzades
     *
     * @return integer
     */
    public function getRealitzades()
    {
        return $this->realitzades;
    }

    /**
     * Set vehicle
     *
     * @param integer $realitzades
     *
     * @return realitzades
     */
    public function setRealitzades($realitzades)
    {
        $this->realitzades = $realitzades;

        return $this;
    }
}


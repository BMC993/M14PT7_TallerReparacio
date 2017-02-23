<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicles
 *
 * @ORM\Table(name="vehicles", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_1FCE69FA15DF1885", columns={"matricula"}), @ORM\UniqueConstraint(name="UNIQ_1FCE69FA35203326", columns={"clients_nif"})})
 * @ORM\Entity
 */
class Vehicles
{
    /**
     * @var string
     *
     * @ORM\Column(name="matricula", type="string", length=255, nullable=false)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=false)
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipusCombustible", type="integer", nullable=false)
     */
    private $tipuscombustible;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \TallerReparacio\BackendBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="TallerReparacio\BackendBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clients_nif", referencedColumnName="NIF")
     * })
     */
    private $clientsNif;



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
     * Set tipuscombustible
     *
     * @param integer $tipuscombustible
     *
     * @return Vehicles
     */
    public function setTipuscombustible($tipuscombustible)
    {
        $this->tipuscombustible = $tipuscombustible;

        return $this;
    }

    /**
     * Get tipuscombustible
     *
     * @return integer
     */
    public function getTipuscombustible()
    {
        return $this->tipuscombustible;
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
     * Set clientsNif
     *
     * @param \TallerReparacio\BackendBundle\Entity\Clients $clientsNif
     *
     * @return Vehicles
     */
    public function setClientsNif(\TallerReparacio\BackendBundle\Entity\Clients $clientsNif = null)
    {
        $this->clientsNif = $clientsNif;

        return $this;
    }

    /**
     * Get clientsNif
     *
     * @return \TallerReparacio\BackendBundle\Entity\Clients
     */
    public function getClientsNif()
    {
        return $this->clientsNif;
    }
}

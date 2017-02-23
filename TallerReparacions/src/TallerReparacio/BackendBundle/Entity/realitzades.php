<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Realitzades
 *
 * @ORM\Table(name="realitzades", uniqueConstraints={@ORM\UniqueConstraint(name="nif_client", columns={"nif_client"})}, indexes={@ORM\Index(name="vehicle_matricula", columns={"vehicle_matricula"})})
 * @ORM\Entity
 */
class Realitzades
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataEntrada", type="date", nullable=false)
     */
    private $dataentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataSortida", type="date", nullable=false)
     */
    private $datasortida;

    /**
     * @var integer
     *
     * @ORM\Column(name="horesDedicades", type="integer", nullable=false)
     */
    private $horesdedicades;

    /**
     * @var string
     *
     * @ORM\Column(name="nif_client", type="string", length=10, nullable=false)
     */
    private $nifClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \TallerReparacio\BackendBundle\Entity\Vehicles
     *
     * @ORM\ManyToOne(targetEntity="TallerReparacio\BackendBundle\Entity\Vehicles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehicle_matricula", referencedColumnName="matricula")
     * })
     */
    private $vehicleMatricula;



    /**
     * Set dataentrada
     *
     * @param \DateTime $dataentrada
     *
     * @return Realitzades
     */
    public function setDataentrada($dataentrada)
    {
        $this->dataentrada = $dataentrada;

        return $this;
    }

    /**
     * Get dataentrada
     *
     * @return \DateTime
     */
    public function getDataentrada()
    {
        return $this->dataentrada;
    }

    /**
     * Set datasortida
     *
     * @param \DateTime $datasortida
     *
     * @return Realitzades
     */
    public function setDatasortida($datasortida)
    {
        $this->datasortida = $datasortida;

        return $this;
    }

    /**
     * Get datasortida
     *
     * @return \DateTime
     */
    public function getDatasortida()
    {
        return $this->datasortida;
    }

    /**
     * Set horesdedicades
     *
     * @param integer $horesdedicades
     *
     * @return Realitzades
     */
    public function setHoresdedicades($horesdedicades)
    {
        $this->horesdedicades = $horesdedicades;

        return $this;
    }

    /**
     * Get horesdedicades
     *
     * @return integer
     */
    public function getHoresdedicades()
    {
        return $this->horesdedicades;
    }

    /**
     * Set nifClient
     *
     * @param string $nifClient
     *
     * @return Realitzades
     */
    public function setNifClient($nifClient)
    {
        $this->nifClient = $nifClient;

        return $this;
    }

    /**
     * Get nifClient
     *
     * @return string
     */
    public function getNifClient()
    {
        return $this->nifClient;
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
     * Set vehicleMatricula
     *
     * @param \TallerReparacio\BackendBundle\Entity\Vehicles $vehicleMatricula
     *
     * @return Realitzades
     */
    public function setVehicleMatricula(\TallerReparacio\BackendBundle\Entity\Vehicles $vehicleMatricula = null)
    {
        $this->vehicleMatricula = $vehicleMatricula;

        return $this;
    }

    /**
     * Get vehicleMatricula
     *
     * @return \TallerReparacio\BackendBundle\Entity\Vehicles
     */
    public function getVehicleMatricula()
    {
        return $this->vehicleMatricula;
    }
}

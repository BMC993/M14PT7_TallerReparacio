<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * realitzades
 *
 * @ORM\Table(name="realitzades")
 * @ORM\Entity(repositoryClass="TallerReparacio\BackendBundle\Repository\realitzadesRepository")
 */
class realitzades
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
     * @var \DateTime
     *
     * @ORM\Column(name="dataEntrada", type="date")
     */
    private $dataEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataSortida", type="date")
     */
    private $dataSortida;

    /**
     * @var int
     *
     * @ORM\Column(name="horesDedicades", type="integer")
     */
    private $horesDedicades;

     /**
     * @ORM\ManyToMany(targetEntity="Vehicles", inversedBy="realitzades")
     * @ORM\JoinColumn(name="vehicle_matri", referencedColumnName="matricula")
     */
    protected $vehicle;

    /**
     * @ORM\ManyToMany(targetEntity="Reparacions", inversedBy="realitzades")
     * @ORM\JoinColumn(name="reparacions_codi", referencedColumnName="codi")
     */
    protected $reparacio;


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
     * Set dataEntrada
     *
     * @param \DateTime $dataEntrada
     *
     * @return realitzades
     */
    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        return $this;
    }

    /**
     * Get dataEntrada
     *
     * @return \DateTime
     */
    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    /**
     * Set dataSortida
     *
     * @param \DateTime $dataSortida
     *
     * @return realitzades
     */
    public function setDataSortida($dataSortida)
    {
        $this->dataSortida = $dataSortida;

        return $this;
    }

    /**
     * Get dataSortida
     *
     * @return \DateTime
     */
    public function getDataSortida()
    {
        return $this->dataSortida;
    }

    /**
     * Set horesDedicades
     *
     * @param integer $horesDedicades
     *
     * @return realitzades
     */
    public function setHoresDedicades($horesDedicades)
    {
        $this->horesDedicades = $horesDedicades;

        return $this;
    }

    /**
     * Get horesDedicades
     *
     * @return int
     */
    public function getHoresDedicades()
    {
        return $this->horesDedicades;
    }
}


<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparacions
 *
 * @ORM\Table(name="reparacions")
 * @ORM\Entity(repositoryClass="TallerReparacio\BackendBundle\Repository\ReparacionsRepository")
 */
class Reparacions
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
     * @ORM\Column(name="codi", type="string", length=255, unique=true)
     */
    private $codi;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcio", type="string", length=255)
     */
    private $descripcio;

    /**
     * @ORM\ManyToMany(targetEntity="realitzades", mappedBy="reparacio")
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
     * Set codi
     *
     * @param string $codi
     *
     * @return Reparacions
     */
    public function setCodi($codi)
    {
        $this->codi = $codi;

        return $this;
    }

    /**
     * Get codi
     *
     * @return string
     */
    public function getCodi()
    {
        return $this->codi;
    }

    /**
     * Set descripcio
     *
     * @param string $descripcio
     *
     * @return Reparacions
     */
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    /**
     * Get descripcio
     *
     * @return string
     */
    public function getDescripcio()
    {
        return $this->descripcio;
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


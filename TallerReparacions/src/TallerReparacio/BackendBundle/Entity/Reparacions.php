<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparacions
 *
 * @ORM\Table(name="reparacions", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_47FFB4417EA37CB3", columns={"codi"})})
 * @ORM\Entity
 */
class Reparacions
{
    /**
     * @var string
     *
     * @ORM\Column(name="codi", type="string", length=255, nullable=false)
     */
    private $codi;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcio", type="string", length=255, nullable=false)
     */
    private $descripcio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

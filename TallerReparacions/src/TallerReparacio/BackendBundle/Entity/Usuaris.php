<?php

namespace TallerReparacio\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuaris
 *
 * @ORM\Table(name="usuaris")
 * @ORM\Entity(repositoryClass="TallerReparacio\BackendBundle\Repository\UsuarisRepository")
 */
class Usuaris
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
     * @ORM\Column(name="nom", type="string", length=20, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=20)
     */
    private $password;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Usuaris
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
     * Set password
     *
     * @param string $password
     *
     * @return Usuaris
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}


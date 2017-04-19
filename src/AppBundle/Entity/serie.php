<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\serieRepository")
 */
class serie
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
     * @var int
     *
     * @ORM\Column(name="name", type="integer")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="userid", type="integer")
     */
    private $userid;


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
     * Set name
     *
     * @param integer $name
     *
     * @return serie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return serie
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity
 */
class Wishlist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     */
    private $artiste;

    /**
     * @var integer
     *
     * @ORM\Column(name="usermain", type="integer", nullable=false)
     */
    private $usermain;



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
     * Set artiste
     *
     * @param integer $artiste
     *
     * @return Wishlist
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return integer
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set usermain
     *
     * @param integer $usermain
     *
     * @return Wishlist
     */
    public function setUsermain($usermain)
    {
        $this->usermain = $usermain;

        return $this;
    }

    /**
     * Get usermain
     *
     * @return integer
     */
    public function getUsermain()
    {
        return $this->usermain;
    }
}

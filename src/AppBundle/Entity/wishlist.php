<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\wishlistRepository")
 */
class wishlist
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
     * @ORM\Column(name="artiste", type="integer")
     */
    private $artiste;

    /**
     * @var int
     *
     * @ORM\Column(name="usermain", type="integer")
     */
    private $usermain;


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
     * Set artiste
     *
     * @param integer $artiste
     *
     * @return wishlist
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return int
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
     * @return wishlist
     */
    public function setUsermain($usermain)
    {
        $this->usermain = $usermain;

        return $this;
    }

    /**
     * Get usermain
     *
     * @return int
     */
    public function getUsermain()
    {
        return $this->usermain;
    }
}


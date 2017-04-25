<?php

namespace AppBundle\Entity;

/**
 * Wishlist
 */
class Wishlist
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $artiste;

    /**
     * @var integer
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


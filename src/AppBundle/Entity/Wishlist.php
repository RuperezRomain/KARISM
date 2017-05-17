<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use JsonSerializable;
use Symfony\Component\Security\Core\User\User;

/**
 * Wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WishlistRepository")
 */
class Wishlist implements JsonSerializable
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
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="artiste", referencedColumnName="id")
     */
    private $artiste;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="usermain", referencedColumnName="id")
     */
    private $usermain;


    
    public function __toString() {
    return $this->artiste->getUsername().$this->artiste->getprofilPicture();
}
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
     * @return int
     */
    public function getUsermain()
    {
        return $this->usermain;
    }

    public function jsonSerialize() {
                        return array(
            "id" => $this->id
        );
    }

}


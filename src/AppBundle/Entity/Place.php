<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 */
class Place
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
     * Many Place have One fk_place_type.
     * @ManyToOne(targetEntity="Place_type")
     * @JoinColumn(name="place_type_id", referencedColumnName="id")
     */
    private $fk_placetype;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     *
     * @ManyToOne(targetEntity="City")
     * @JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $fk_city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="available", type="datetime")
     */
    private $available;
    
    /**
     * @var int
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $fk_user;

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
     * Set fk_place_type
     *
     * @param integer $fk_place_type
     *
     * @return Place
     */
    public function setFkPlaceType($fk_place_type)
    {
        $this->fk_place_type = $fk_place_type;

        return $this;
    }

    /**
     * Get fk_place_type
     *
     * @return int
     */
    public function getFkPlaceType()
    {
        return $this->fk_placetype;
    }
    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Place
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Place
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Place
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set fk_city
     *
     * @param integer $fk_city
     *
     * @return Place
     */
    public function setFkCity($fk_city)
    {
        $this->fk_city = $fk_city;

        return $this;
    }

    /**
     * Get fk_city
     *
     * @return int
     */
    public function getFkcity()
    {
        return $this->fk_city;
    }
    

    /**
     * Set fk_user
     *
     * @param integer $fk_user
     *
     * @return Place
     */
    public function setUserid($fk_user)
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    /**
     * Get fk_user
     *
     * @return int
     */
    public function getFkUserid()
    {
        return $this->fk_user;
    }

    /**
     * Set available
     *
     * @param \DateTime $available
     *
     * @return Place
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return \DateTime
     */
    public function getAvailable()
    {
        return $this->available;
    }
}


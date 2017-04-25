<?php

namespace AppBundle\Entity;

/**
 * Place
 */
class Place
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $placetype;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var integer
     */
    private $city;

    /**
     * @var integer
     */
    private $userid;

    /**
     * @var \DateTime
     */
    private $available;


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
     * Set placetype
     *
     * @param integer $placetype
     *
     * @return Place
     */
    public function setPlacetype($placetype)
    {
        $this->placetype = $placetype;

        return $this;
    }

    /**
     * Get placetype
     *
     * @return integer
     */
    public function getPlacetype()
    {
        return $this->placetype;
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
     * @return integer
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
     * @return integer
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
     * Set city
     *
     * @param integer $city
     *
     * @return Place
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Place
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
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


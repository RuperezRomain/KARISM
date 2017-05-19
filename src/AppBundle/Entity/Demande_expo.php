<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use JsonSerializable;
use Serializable;

/**
 * Demande_expo
 *
 * @ORM\Table(name="demande_expo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Demande_expoRepository")
 */
class Demande_expo implements JsonSerializable, Serializable
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
     * @JoinColumn(name="guest", referencedColumnName="id")
     */
    private $guest;

    /**
     * @ManyToOne(targetEntity="Exposition")
     * @JoinColumn(name="expo", referencedColumnName="id")
     */
    private $expo;

    /**
     * @var integer
     *
     * @ORM\Column(name="validate", type="integer")
     */
    private $validate;


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
     * Set guest
     *
     * @param integer $guest
     *
     * @return Demande_expo
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guest
     *
     * @return int
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * Set expo
     *
     * @param integer $expo
     *
     * @return Demande_expo
     */
    public function setExpo($expo)
    {
        $this->expo = $expo;

        return $this;
    }

    /**
     * Get expo
     *
     * @return int
     */
    public function getExpo()
    {
        return $this->expo;
    }

    /**
     * Set validate
     *
     * @param boolean $validate
     *
     * @return Demande_expo
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return bool
     */
    public function getValidate()
    {
        return $this->validate;
    }

    public function jsonSerialize() {
        return array(
          "id" => $this->id,
          "expo" => $this->expo,
          "guest" => $this->guest,
          "validate" => $this->validate
        );
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->expo,
            $this->guest,
            $this->validate
        ));
    }

    public function unserialize($serialized) {
        list (

            $this->id,
            $this->expo,
            $this->guest,
            $this->validate
                ) = unserialize($serialized);
    }

}


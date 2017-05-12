<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use JsonSerializable;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 */
class Place implements JsonSerializable {

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
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="ImagesPlaces")
     * @ORM\JoinTable(name="place_picture",
     *      joinColumns={@ORM\JoinColumn(name="img_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="place_id",referencedColumnName="id")})
     */
    private $fk_ImagesPlace;

    /**
     * @var int
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer" ,nullable=true)
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer",nullable=true)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255,nullable=true)
     */
    private $adress;

    /**
     *
     * @ManyToOne(targetEntity="City")
     * @JoinColumn(name="city_id", referencedColumnName="id",nullable=true)
     */
    private $fk_city;

    /**
     * @var \Date
     *
     * @ORM\Column(name="availableStart", type="datetime",nullable=true)
     */
    private $availableStart;

    /**
     * @var \Date
     *
     * @ORM\Column(name="availableEnd", type="datetime",nullable=true)
     */
    private $availableEnd;

    /**
     * @var int
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id",nullable=true)
     */
    private $fk_user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;
    
    function getImg() {
        return $this->img;
    }

    function setImg($img) {
        $this->img = $img;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set fk_place_type
     *
     * @param integer $fk_place_type
     *
     * @return Place
     */
    public function setFkPlaceType($fk_place_type) {
        $this->fk_place_type = $fk_place_type;

        return $this;
    }

    /**
     * Get fk_place_type
     *
     * @return int
     */
    public function getFkPlaceType() {
        return $this->fk_placetype;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Place
     */
    public function setSize($size) {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Place
     */
    public function setCapacity($capacity) {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity() {
        return $this->capacity;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Place
     */
    public function setAdress($adress) {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress() {
        return $this->adress;
    }

    /**
     * Set fk_city
     *
     * @param integer $fk_city
     *
     * @return Place
     */
    public function setFkCity($fk_city) {
        $this->fk_city = $fk_city;

        return $this;
    }

    /**
     * Get fk_city
     *
     * @return int
     */
    public function getFkcity() {
        return $this->fk_city;
    }

    /**
     * Set fk_user
     *
     * @param integer $fk_user
     *
     * @return Place
     */
    public function setUserid($fk_user) {
        $this->fk_user = $fk_user;

        return $this;
    }

    /**
     * Get fk_user
     *
     * @return int
     */
    public function getFkUserid() {
        return $this->fk_user;
    }

    /**
     * Set availableStart
     *
     * @param DateTime $availableStart
     *
     * @return Place
     */
    public function setAvailableStart($availableStart) {
        $this->availableStart = $availableStart;

        return $this;
    }

    /**
     * Get availableStart
     *
     * @return DateTime
     */
    public function getAvailableStart() {
        return $this->availableStart;
    }
    
    /**
     * Get availableEnd
     *
     * @return DateTime
     */
    function getAvailableEnd() {
        return $this->availableEnd;
    }

    /**
     * Set availableEnd
     *
     * @param DateTime $availableEnd
     *
     * @return Place
     */
    function setAvailableEnd($availableEnd) {
        $this->availableEnd = $availableEnd;
    }
    
    public function __construct()
    {
        $this->fk_ImagesPlace = new ArrayCollection();
    }
   

    function getFk_ImagesPlace() {
        return $this->fk_ImagesPlace->toArray();
    }

    function setFk_ImagesPlace($fk_ImagesPlace) {
        $this->fk_ImagesPlace = $fk_ImagesPlace;
    }

    public function jsonSerialize() {
        return array(
            "id" => $this->id,
            "city" => $this->fk_city,
            "name" => $this->name,
            "img" => $this->img,
            "adress" => $this->adress,
        );
    }
}

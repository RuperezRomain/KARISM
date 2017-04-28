<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SerieRepository")
 */
class Serie {

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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * Many Users have One Address.
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="userid", referencedColumnName="id")
     */
    private $userid;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Picture")
     * @ORM\JoinTable(name="serie_picture",
     *      joinColumns={@ORM\JoinColumn(name="serie_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="picture_id",referencedColumnName="id")})
     */
    private $fk_picture;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Serie
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Serie
     */
    public function setUserid($userid) {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getUserid() {
        return $this->userid;
    }

 public function __construct()
    {
        $this->fk_picture = new ArrayCollection();
    }
    
    function getFk_picture() {
        return $this->fk_picture->toArray();
    }

    function setFk_picture($fk_picture) {
        $this->fk_picture = $fk_picture;
    }
    
    
     public function jsonSerialize() {
        return array(
            "fk_picture" => $this->fk_picture
);}
                

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeriePicture
 *
 * @ORM\Table(name="serie_picture")
 * @ORM\Entity
 */
class SeriePicture
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
     * @ORM\Column(name="serie", type="integer", nullable=false)
     */
    private $serie;

    /**
     * @var integer
     *
     * @ORM\Column(name="pictures", type="integer", nullable=false)
     */
    private $pictures;



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
     * Set serie
     *
     * @param integer $serie
     *
     * @return SeriePicture
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return integer
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set pictures
     *
     * @param integer $pictures
     *
     * @return SeriePicture
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get pictures
     *
     * @return integer
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}

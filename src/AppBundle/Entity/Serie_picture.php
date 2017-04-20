<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie_picture
 *
 * @ORM\Table(name="serie_picture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Serie_pictureRepository")
 */
class Serie_picture
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
     * @ORM\Column(name="serie", type="integer")
     */
    private $serie;

    /**
     * @var int
     *
     * @ORM\Column(name="pictures", type="integer")
     */
    private $pictures;


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
     * Set serie
     *
     * @param integer $serie
     *
     * @return Serie_picture
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return int
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
     * @return Serie_picture
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get pictures
     *
     * @return int
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}


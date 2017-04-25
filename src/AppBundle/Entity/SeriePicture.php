<?php

namespace AppBundle\Entity;

/**
 * SeriePicture
 */
class SeriePicture
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $serie;

    /**
     * @var integer
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


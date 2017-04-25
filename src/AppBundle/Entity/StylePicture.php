<?php

namespace AppBundle\Entity;

/**
 * StylePicture
 */
class StylePicture
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $picture;

    /**
     * @var integer
     */
    private $style;


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
     * Set picture
     *
     * @param integer $picture
     *
     * @return StylePicture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return integer
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set style
     *
     * @param integer $style
     *
     * @return StylePicture
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return integer
     */
    public function getStyle()
    {
        return $this->style;
    }
}


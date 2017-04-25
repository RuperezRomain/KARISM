<?php

namespace AppBundle\Entity;

/**
 * StyleUser
 */
class StyleUser
{
    /**
     * @var integer
     */
    private $id;

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
     * Set style
     *
     * @param integer $style
     *
     * @return StyleUser
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


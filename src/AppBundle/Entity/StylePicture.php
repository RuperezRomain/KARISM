<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StylePicture
 *
 * @ORM\Table(name="style_picture")
 * @ORM\Entity
 */
class StylePicture
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
     * @ORM\Column(name="picture", type="integer", nullable=false)
     */
    private $picture;

    /**
     * @var integer
     *
     * @ORM\Column(name="style", type="integer", nullable=false)
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

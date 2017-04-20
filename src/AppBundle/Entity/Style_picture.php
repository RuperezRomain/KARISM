<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Style_picture
 *
 * @ORM\Table(name="style_picture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Style_pictureRepository")
 */
class Style_picture
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
     * @ORM\Column(name="picture", type="integer")
     */
    private $picture;

    /**
     * @var int
     *
     * @ORM\Column(name="style", type="integer")
     */
    private $style;


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
     * Set picture
     *
     * @param integer $picture
     *
     * @return Style_picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return int
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
     * @return Style_picture
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return int
     */
    public function getStyle()
    {
        return $this->style;
    }
}


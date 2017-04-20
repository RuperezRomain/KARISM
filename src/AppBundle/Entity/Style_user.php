<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Style_user
 *
 * @ORM\Table(name="style_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Style_userRepository")
 */
class Style_user
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
     * Set style
     *
     * @param integer $style
     *
     * @return Style_user
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


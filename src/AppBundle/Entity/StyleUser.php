<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StyleUser
 *
 * @ORM\Table(name="style_user")
 * @ORM\Entity
 */
class StyleUser
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

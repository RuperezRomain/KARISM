<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * SuggestionCat
 *
 * @ORM\Table(name="suggestion_cat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SuggestionCatRepository")
 */
class SuggestionCat implements JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return SuggestionCat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function __toString() {
        return $this->name;
    }

    public function jsonSerialize() {
        return array(
            "id" => $this->id,
            "name" => $this->name,
        );
    }
}


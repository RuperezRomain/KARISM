<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Check_liste_model
 *
 * @ORM\Table(name="check_liste_model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Check_liste_modelRepository")
 */
class Check_liste_model
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255)
     */
    private $task;

    /**
     * @var bool
     *
     * @ORM\Column(name="checkend", type="boolean")
     */
    private $checkend;


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
     * Set title
     *
     * @param string $title
     *
     * @return Check_liste_model
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set task
     *
     * @param string $task
     *
     * @return Check_liste_model
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set checkend
     *
     * @param boolean $checkend
     *
     * @return Check_liste_model
     */
    public function setCheckend($checkend)
    {
        $this->checkend = $checkend;

        return $this;
    }

    /**
     * Get checkend
     *
     * @return bool
     */
    public function getCheckend()
    {
        return $this->checkend;
    }
}


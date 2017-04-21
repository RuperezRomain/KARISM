<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CheckListeModel
 *
 * @ORM\Table(name="check_liste_model")
 * @ORM\Entity
 */
class CheckListeModel
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255, nullable=false)
     */
    private $task;

    /**
     * @var boolean
     *
     * @ORM\Column(name="checkend", type="boolean", nullable=false)
     */
    private $checkend;



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
     * Set title
     *
     * @param string $title
     *
     * @return CheckListeModel
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
     * @return CheckListeModel
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
     * @return CheckListeModel
     */
    public function setCheckend($checkend)
    {
        $this->checkend = $checkend;

        return $this;
    }

    /**
     * Get checkend
     *
     * @return boolean
     */
    public function getCheckend()
    {
        return $this->checkend;
    }
}

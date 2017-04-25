<?php

namespace AppBundle\Entity;

/**
 * CheckListeModel
 */
class CheckListeModel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $task;

    /**
     * @var boolean
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


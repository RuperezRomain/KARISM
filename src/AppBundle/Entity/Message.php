<?php

namespace AppBundle\Entity;

/**
 * Message
 */
class Message
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $hour;

    /**
     * @var string
     */
    private $exposition;


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
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set hour
     *
     * @param \DateTime $hour
     *
     * @return Message
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return \DateTime
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set exposition
     *
     * @param string $exposition
     *
     * @return Message
     */
    public function setExposition($exposition)
    {
        $this->exposition = $exposition;

        return $this;
    }

    /**
     * Get exposition
     *
     * @return string
     */
    public function getExposition()
    {
        return $this->exposition;
    }
}


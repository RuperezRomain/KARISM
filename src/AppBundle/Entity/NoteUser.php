<?php

namespace AppBundle\Entity;

/**
 * NoteUser
 */
class NoteUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $field;


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
     * Set note
     *
     * @param string $note
     *
     * @return NoteUser
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set field
     *
     * @param string $field
     *
     * @return NoteUser
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }
}


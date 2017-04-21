<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exposition
 *
 * @ORM\Table(name="exposition")
 * @ORM\Entity
 */
class Exposition
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
     * @ORM\Column(name="placehote", type="integer", nullable=false)
     */
    private $placehote;

    /**
     * @var integer
     *
     * @ORM\Column(name="artiste", type="integer", nullable=false)
     */
    private $artiste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="listinvite", type="integer", nullable=false)
     */
    private $listinvite;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="artistviewed", type="boolean", nullable=false)
     */
    private $artistviewed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hoteviewed", type="boolean", nullable=false)
     */
    private $hoteviewed;

    /**
     * @var integer
     *
     * @ORM\Column(name="checklistehote", type="integer", nullable=false)
     */
    private $checklistehote;

    /**
     * @var integer
     *
     * @ORM\Column(name="checklisteartist", type="integer", nullable=false)
     */
    private $checklisteartist;



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
     * Set placehote
     *
     * @param integer $placehote
     *
     * @return Exposition
     */
    public function setPlacehote($placehote)
    {
        $this->placehote = $placehote;

        return $this;
    }

    /**
     * Get placehote
     *
     * @return integer
     */
    public function getPlacehote()
    {
        return $this->placehote;
    }

    /**
     * Set artiste
     *
     * @param integer $artiste
     *
     * @return Exposition
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste
     *
     * @return integer
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Exposition
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set listinvite
     *
     * @param integer $listinvite
     *
     * @return Exposition
     */
    public function setListinvite($listinvite)
    {
        $this->listinvite = $listinvite;

        return $this;
    }

    /**
     * Get listinvite
     *
     * @return integer
     */
    public function getListinvite()
    {
        return $this->listinvite;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Exposition
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set artistviewed
     *
     * @param boolean $artistviewed
     *
     * @return Exposition
     */
    public function setArtistviewed($artistviewed)
    {
        $this->artistviewed = $artistviewed;

        return $this;
    }

    /**
     * Get artistviewed
     *
     * @return boolean
     */
    public function getArtistviewed()
    {
        return $this->artistviewed;
    }

    /**
     * Set hoteviewed
     *
     * @param boolean $hoteviewed
     *
     * @return Exposition
     */
    public function setHoteviewed($hoteviewed)
    {
        $this->hoteviewed = $hoteviewed;

        return $this;
    }

    /**
     * Get hoteviewed
     *
     * @return boolean
     */
    public function getHoteviewed()
    {
        return $this->hoteviewed;
    }

    /**
     * Set checklistehote
     *
     * @param integer $checklistehote
     *
     * @return Exposition
     */
    public function setChecklistehote($checklistehote)
    {
        $this->checklistehote = $checklistehote;

        return $this;
    }

    /**
     * Get checklistehote
     *
     * @return integer
     */
    public function getChecklistehote()
    {
        return $this->checklistehote;
    }

    /**
     * Set checklisteartist
     *
     * @param integer $checklisteartist
     *
     * @return Exposition
     */
    public function setChecklisteartist($checklisteartist)
    {
        $this->checklisteartist = $checklisteartist;

        return $this;
    }

    /**
     * Get checklisteartist
     *
     * @return integer
     */
    public function getChecklisteartist()
    {
        return $this->checklisteartist;
    }
}

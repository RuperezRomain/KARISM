<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exposition
 *
 * @ORM\Table(name="exposition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpositionRepository")
 */
class Exposition
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
     * @ORM\Column(name="placehote", type="integer")
     */
    private $placehote;

    /**
     * @var int
     *
     * @ORM\Column(name="artiste", type="integer")
     */
    private $artiste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="listinvite", type="integer")
     */
    private $listinvite;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var bool
     *
     * @ORM\Column(name="artistviewed", type="boolean")
     */
    private $artistviewed;

    /**
     * @var bool
     *
     * @ORM\Column(name="hoteviewed", type="boolean")
     */
    private $hoteviewed;

    /**
     * @var int
     *
     * @ORM\Column(name="checklistehote", type="integer")
     */
    private $checklistehote;

    /**
     * @var int
     *
     * @ORM\Column(name="checklisteartist", type="integer")
     */
    private $checklisteartist;


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
     * @return int
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
     * @return int
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
     * @return int
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
     * @return int
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
     * @return bool
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
     * @return bool
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
     * @return int
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
     * @return int
     */
    public function getChecklisteartist()
    {
        return $this->checklisteartist;
    }
}


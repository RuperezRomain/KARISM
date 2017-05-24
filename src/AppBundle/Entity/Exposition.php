<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use JsonSerializable;
use Symfony\Component\Validator\Constraints\File;

/**
 * Exposition
 *
 * @ORM\Table(name="exposition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpositionRepository")
 */
class Exposition implements JsonSerializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Many Users have One Address.
     * @ManyToOne(targetEntity="Place")
     * @JoinColumn(name="fk_Place", referencedColumnName="id",nullable=true)
     */
    private $fk_Place;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Serie")
     * @ORM\JoinTable(name="Exposition_serie",
     *      joinColumns={@ORM\JoinColumn(name="fk_Expo",referencedColumnName="id",nullable=true)},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fk_Serie",referencedColumnName="id")})
     */
    private $fk_Serie;

    /**
     * 
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="fk_UserHote", referencedColumnName="id",nullable=true)
     */
    private $fk_UserHote;

    /**
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="fk_UserArtiste", referencedColumnName="id",nullable=true)
     */
    private $fk_UserArtiste;

    /**
     * 
     * @Assert\Range(
     *              min = "now",
     *              minMessage = "La date n'est pas valide",
     *              )
     * @ORM\Column(
     *             name="date",
     *             type="datetime"
     *             )
     */
    private $date;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="expo_UserInvite",
     *      joinColumns={@ORM\JoinColumn(name="fk_UserInvite",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fk_Expo",referencedColumnName="id")})
     */
    private $listinvite;

    /**
     * Many Place have One fk_place_type.
     * @ManyToOne(targetEntity="City")
     * @JoinColumn(name="fk_ville", referencedColumnName="id")
     */
    private $fk_ville;

    /**
     * @var int
     *
     * @ORM\Column(name="surfaceRquirements", type="integer")
     */
    private $surfaceRquirements;

    /**
     * @var int
     *
     * @ORM\Column(name="inviteRquirements", type="integer")
     */
    private $inviteRquirements;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="artistviewed", type="boolean", nullable=true)
     */
    private $artistviewed;

    /**
     * @var bool
     *
     * @ORM\Column(name="hoteviewed", type="boolean",nullable=true)
     */
    private $hoteviewed;

    /**
     * Many Users have One Address.
     * @ManyToOne(targetEntity="Status")
     * @JoinColumn(name="status", referencedColumnName="id",nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="messageHote", type="string", nullable=true)
     */
    private $messageHote;

    /**
     * @var bool
     *
     * @ORM\Column(name="artisteValid", type="boolean", nullable=true)
     */
    private $artisteValid;

    /**
     * @var bool
     *
     * @ORM\Column(name="hoteValid", type="boolean", nullable=true)
     */
    private $hoteValid;

    /**
     * @ORM\Column(name="img", type="string", nullable=true)
     * @Assert\File(
     * maxSize = "1024k",
     * 
     * mimeTypes={"image/png",
     *            "image/jpeg",
     *            "application/pdf",
     *           }
     * )
     */
    private $img;

    function getId() {
        return $this->id;
    }

    function getFk_Place() {
        return $this->fk_Place;
    }

    public function __construct() {
        $this->fk_Serie = new ArrayCollection();
    }

    function getFkserie() {
        return $this->fk_Serie->toArray();
    }

    function getFk_UserHote() {
        return $this->fk_UserHote;
    }

    function getFk_UserArtiste() {
        return $this->fk_UserArtiste;
    }

    function getDate() {
        return $this->date;
    }

    function getListinvite() {
        return $this->listinvite;
    }

    function getFkville() {
        return $this->fk_ville;
    }

    function getSurfaceRquirements() {
        return $this->surfaceRquirements;
    }

    function getInviteRquirements() {
        return $this->inviteRquirements;
    }

    function getDescription() {
        return $this->description;
    }

    function getArtistviewed() {
        return $this->artistviewed;
    }

    function getHoteviewed() {
        return $this->hoteviewed;
    }

    function getStatus() {
        return $this->status;
    }

    function setFk_Place($fk_Place) {
        $this->fk_Place = $fk_Place;
    }

    function setFkserie($fk_Serie) {
        $this->fk_Serie = $fk_Serie;
    }

    function setFk_UserHote($fk_UserHote) {
        $this->fk_UserHote = $fk_UserHote;
    }

    function setFk_UserArtiste($fk_UserArtiste) {
        $this->fk_UserArtiste = $fk_UserArtiste;
    }

    function setDate(DateTime $date) {
        $this->date = $date;
    }

    function setListinvite($listinvite) {
        $this->listinvite = $listinvite;
    }

    function setFkville($fk_ville) {
        $this->fk_ville = $fk_ville;
    }

    function setSurfaceRquirements($surfaceRquirements) {
        $this->surfaceRquirements = $surfaceRquirements;
    }

    function setInviteRquirements($inviteRquirements) {
        $this->inviteRquirements = $inviteRquirements;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setArtistviewed($artistviewed) {
        $this->artistviewed = $artistviewed;
    }

    function setHoteviewed($hoteviewed) {
        $this->hoteviewed = $hoteviewed;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getMessageHote() {
        return $this->messageHote;
    }

    function setMessageHote($messageHote) {
        $this->messageHote = $messageHote;
    }

    function getArtisteValid() {
        return $this->artisteValid;
    }

    function getHoteValid() {
        return $this->hoteValid;
    }

    function setArtisteValid($artisteValid) {
        $this->artisteValid = $artisteValid;
    }

    function setHoteValid($hoteValid) {
        $this->hoteValid = $hoteValid;
    }

    function getImg() {
        return $this->img;
    }

    function setImg($img) {
        $this->img = $img;
    }

    public function jsonSerialize() {
        return array(
            "id" => $this->id,
//            "place" => $this->place,
            "artiste" => $this->fk_UserArtiste,
            "date" => $this->date,
            "ville" => $this->fk_ville,
            "serie" => $this->fk_Serie,
        );
    }

}

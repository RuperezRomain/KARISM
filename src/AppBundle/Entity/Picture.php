<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PictureRepository")
 */
class Picture implements \JsonSerializable{

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var int
     *
     * @ORM\Column(name="style", type="integer")
     */
    private $style;

    /**
     * @var int
     *
     * @ORM\Column(name="techniques", type="integer")
     */
    private $techniques;

    /**
     * @var int
     *
     * @ORM\Column(name="genres", type="integer")
     */
    private $genres;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;
    ///Le champ expo correspond aux exposition où l’œuvre à été visible
    /**
     * @var int
     *
     * @ORM\Column(name="expos", type="integer")
     */
    private $expos;
    ///Le champ -commentaire correspond a la description de l'oeuvre
    /**
     * @var int
     *
     * @ORM\Column(name="commentaire", type="integer")
     */
    private $commentaire;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Picture
     */
    public function setUrl($img) {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getUrl() {
        return $this->img;
    }

    /**
     * Set style
     *
     * @param integer $style
     *
     * @return Picture
     */
    public function setStyle($style) {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return int
     */
    public function getStyle() {
        return $this->style;
    }

    function getTechniques() {
        return $this->techniques;
    }

    function getGenres() {
        return $this->genres;
    }

    function getSize() {
        return $this->size;
    }

    function getPrix() {
        return $this->prix;
    }

    function getExpos() {
        return $this->expos;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function setTechniques($techniques) {
        $this->techniques = $techniques;
    }

    function setGenres($genres) {
        $this->genres = $genres;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setExpos($expos) {
        $this->expos = $expos;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function getNom() {
        return $this->nom;
    }

    function getImg() {
        return $this->img;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setImg($img) {
        $this->img = $img;
    }

    public function jsonSerialize() {
       
        return array(
            "nom" => $this->nom,
            "style" => $this->style,
            "techniques" => $this->techniques,
            "genres" => $this->genres,
            "size" => $this->size,
            "prix" => $this->prix,
            "expos" => $this->expos,
            "commentaire" => $this->commentaire,
            "img" => $this->img
        );
    }

}

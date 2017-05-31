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
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Style")
     * @ORM\JoinTable(name="style_picture",
     *      joinColumns={@ORM\JoinColumn(name="picture_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="style_id",referencedColumnName="id")})
     */
    private $style;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Technique")
     * @ORM\JoinTable(name="technique_picture",
     *      joinColumns={@ORM\JoinColumn(name="picture_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technique_id",referencedColumnName="id")})
     */
    private $technique;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Genre")
     * @ORM\JoinTable(name="genre_picture",
     *      joinColumns={@ORM\JoinColumn(name="picture_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="genre_id",referencedColumnName="id")})
     */
    private $genre;

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
     * @ORM\Column(name="expos", type="integer", nullable=true)
     */
    private $expos;
    ///Le champ -commentaire correspond a la description de l'oeuvre
    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string")
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

//    
//    public function __construct()
//    {
//        $this->style = new ArrayCollection();
//    }
   

   
    
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
     * Set technique
     *
     * @param integer $technique
     *
     * @return Picture
     */
    public function setTechnique($technique) {
        $this->techniques = $technique;

        return $this;
    }
    /**
     * Set genre
     *
     * @param integer $genre
     *
     * @return Picture
     */
    public function setGenre($genre) {
        $this->genre = $genre;

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

    function getTechnique() {
        return $this->technique;
    }

    function getGenre() {
        return $this->genre;
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
            "technique" => $this->technique,
            "genre" => $this->genre,
            "size" => $this->size,
            "prix" => $this->prix,
            "expos" => $this->expos,
            "commentaire" => $this->commentaire,
            "img" => $this->img
        );
    }

}

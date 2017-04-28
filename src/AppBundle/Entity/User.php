<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Serializable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\File;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, Serializable, JsonSerializable {

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
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id",referencedColumnName="id")})
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=255, nullable=true)
     */
    private $bio;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="profilPicture", type="string", length=255, nullable=true)
     * @File(mimeTypes={ "image/png" })
     */
    private $profilPicture;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @var int
     *
     * @ORM\Column(name="city", type="integer", nullable=true)
     */
    private $city;

    /**
     * @var bool
     *
     * @ORM\Column(name="connected", type="boolean", nullable=true)
     */
    private $connected;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="lastconnect", type="date", nullable=true)
     */
    private $lastconnect;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrExpo", type="integer", nullable=true)
     */
    private $nbrExpo;

    /**
     * @var bool
     *
     * @ORM\Column(name="artistValidate", type="boolean", nullable=true)
     */
    private $artistValidate;

    /**
     * @var bool
     *
     * @ORM\Column(name="hoteValidate", type="boolean", nullable=true)
     */
    private $hoteValidate;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return User
     */
    public function setGenre($genre) {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre() {
        return $this->genre;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles) {
        $this->roles = $roles;

        return $this;
    }

  
     public function __construct()
    {
        $this->roles = new ArrayCollection();
    }
    
    public function getRoles() {
        return $this->roles->toArray();
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set birthday
     *
     * @param DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday) {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return DateTime
     */
    public function getBirthday() {
        return $this->birthday;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return User
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return User
     */
    public function setBio($bio) {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio() {
        return $this->bio;
    }

    /**
     * Set profilPicture
     *
     * @param string $profilPicture
     *
     * @return User
     */
    public function setProfilPicture($profilPicture) {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    /**
     * Get profilPicture
     *
     * @return string
     */
    public function getProfilPicture() {
        return $this->profilPicture;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress) {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress() {
        return $this->adress;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return User
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return int
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set connected
     *
     * @param boolean $connected
     *
     * @return User
     */
    public function setConnected($connected) {
        $this->connected = $connected;

        return $this;
    }

    /**
     * Get connected
     *
     * @return bool
     */
    public function getConnected() {
        return $this->connected;
    }

    /**
     * Set lastconnect
     *
     * @param DateTime $lastconnect
     *
     * @return User
     */
    public function setLastconnect($lastconnect) {
        $this->lastconnect = $lastconnect;

        return $this;
    }

    /**
     * Get lastconnect
     *
     * @return DateTime
     */
    public function getLastconnect() {
        return $this->lastconnect;
    }

    /**
     * Set nbrExpo
     *
     * @param integer $nbrExpo
     *
     * @return User
     */
    public function setNbrExpo($nbrExpo) {
        $this->nbrExpo = $nbrExpo;

        return $this;
    }

    /**
     * Get nbrExpo
     *
     * @return int
     */
    public function getNbrExpo() {
        return $this->nbrExpo;
    }

    /**
     * Set artistValidate
     *
     * @param boolean $artistValidate
     *
     * @return User
     */
    public function setArtistValidate($artistValidate) {
        $this->artistValidate = $artistValidate;

        return $this;
    }

    /**
     * Get artistValidate
     *
     * @return bool
     */
    public function getArtistValidate() {
        return $this->artistValidate;
    }

    /**
     * Set hoteValidate
     *
     * @param boolean $hoteValidate
     *
     * @return User
     */
    public function setHoteValidate($hoteValidate) {
        $this->hoteValidate = $hoteValidate;

        return $this;
    }

    /**
     * Get hoteValidate
     *
     * @return bool
     */
    public function getHoteValidate() {
        return $this->hoteValidate;
    }

    public function eraseCredentials() {
    }

    public function getSalt() {
return null;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
        ));
    }

    public function unserialize($serialized) {
        list (
                $this->id,
                $this->email,
                $this->password,
                ) = unserialize($serialized);
    }

    public function jsonSerialize() {
                return array(
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "username" => $this->username,
            "phone" => $this->phone,
            "bio" => $this->bio,
            "adress" => $this->adress,
            "genre" => $this->genre,
            "user_profilPicture" => $this->profilPicture,
        );
    }

}

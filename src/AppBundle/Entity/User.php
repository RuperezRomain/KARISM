<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="genre", type="string", length=255, nullable=false)
     */
    private $genre;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=255, nullable=false)
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="profilPicture", type="string", length=255, nullable=false)
     */
    private $profilpicture;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=false)
     */
    private $adress;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer", nullable=false)
     */
    private $city;

    /**
     * @var boolean
     *
     * @ORM\Column(name="connected", type="boolean", nullable=false)
     */
    private $connected;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastconnect", type="date", nullable=false)
     */
    private $lastconnect;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrExpo", type="integer", nullable=false)
     */
    private $nbrexpo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="artistValidate", type="boolean", nullable=false)
     */
    private $artistvalidate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hoteValidate", type="boolean", nullable=false)
     */
    private $hotevalidate;



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
     * Set genre
     *
     * @param string $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set profilpicture
     *
     * @param string $profilpicture
     *
     * @return User
     */
    public function setProfilpicture($profilpicture)
    {
        $this->profilpicture = $profilpicture;

        return $this;
    }

    /**
     * Get profilpicture
     *
     * @return string
     */
    public function getProfilpicture()
    {
        return $this->profilpicture;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set connected
     *
     * @param boolean $connected
     *
     * @return User
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * Get connected
     *
     * @return boolean
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * Set lastconnect
     *
     * @param \DateTime $lastconnect
     *
     * @return User
     */
    public function setLastconnect($lastconnect)
    {
        $this->lastconnect = $lastconnect;

        return $this;
    }

    /**
     * Get lastconnect
     *
     * @return \DateTime
     */
    public function getLastconnect()
    {
        return $this->lastconnect;
    }

    /**
     * Set nbrexpo
     *
     * @param integer $nbrexpo
     *
     * @return User
     */
    public function setNbrexpo($nbrexpo)
    {
        $this->nbrexpo = $nbrexpo;

        return $this;
    }

    /**
     * Get nbrexpo
     *
     * @return integer
     */
    public function getNbrexpo()
    {
        return $this->nbrexpo;
    }

    /**
     * Set artistvalidate
     *
     * @param boolean $artistvalidate
     *
     * @return User
     */
    public function setArtistvalidate($artistvalidate)
    {
        $this->artistvalidate = $artistvalidate;

        return $this;
    }

    /**
     * Get artistvalidate
     *
     * @return boolean
     */
    public function getArtistvalidate()
    {
        return $this->artistvalidate;
    }

    /**
     * Set hotevalidate
     *
     * @param boolean $hotevalidate
     *
     * @return User
     */
    public function setHotevalidate($hotevalidate)
    {
        $this->hotevalidate = $hotevalidate;

        return $this;
    }

    /**
     * Get hotevalidate
     *
     * @return boolean
     */
    public function getHotevalidate()
    {
        return $this->hotevalidate;
    }
}

<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $genre;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $phone;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var string
     */
    private $profilpicture;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var integer
     */
    private $city;

    /**
     * @var boolean
     */
    private $connected;

    /**
     * @var \DateTime
     */
    private $lastconnect;

    /**
     * @var integer
     */
    private $nbrexpo;

    /**
     * @var boolean
     */
    private $artistvalidate;

    /**
     * @var boolean
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


<?php

/**
 * The Member class represents a member on the Luvdisc Dating site
 *
 * The Member class represents a member with a name, species, age, gender, pokenav number,
 * email, region, seeking, and bio
 *
 * @author Zack L.
 */
class Member
{
    private $_name;
    private $_species;
    private $_age;
    private $_gender;
    private $_number;
    private $_email;
    private $_region;
    private $_seeking;
    private $_bio;

    /**
     * Constructor for the Member class
     *
     * @param String $name The name of the member
     * @param String $species The species of the member
     * @param int $age The age of the member
     * @param String $gender The gender of the member
     * @param String $number The PokeNav number of the member
     * @return void
     */
    function __construct($name, $species, $age, $gender, $number)
    {
        $this->_name = $name;
        $this->_species = $species;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_number = $number;
    }

    /**
     * Gets the name of the member
     *
     * @return string
     */
    function getName()
    {
        return $this->_name;
    }

    /**
     * Sets the name of the member
     *
     * @param string $name The new name for the member
     * @return void
     */
    function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * Gets the species of the member
     *
     * @return string
     */
    function getSpecies()
    {
        return $this->_species;
    }

    /**
     * Sets the species of the member
     *
     * @param string $species The new species for the member
     * @return void
     */
    function setSpecies($species)
    {
        $this->_species = $species;
    }

    /**
     * Gets the age of the member
     *
     * @return int
     */
    function getAge()
    {
        return $this->_age;
    }

    /**
     * Sets the age of the member
     *
     * @param int $age The new age for the member
     * @return void
     */
    function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * Gets the gender of the member
     *
     * @return string
     */
    function getGender()
    {
        return $this->_gender;
    }

    /**
     * Sets the gender of the member
     *
     * @param string $gender The new gender for the member
     * @return void
     */
    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * Gets the PokeNav number of the member
     *
     * @return string
     */
    function getNumber()
    {
        return $this->_number;
    }

    /**
     * Sets the PokeNav number of the member
     *
     * @param string $number The new PokeNav number for the member
     * @return void
     */
    function setNumber($number)
    {
        $this->_number = $number;
    }

    /**
     * Gets the email of the member
     *
     * @return string
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * Sets the email of the member
     *
     * @param string $email The new email for the member
     * @return void
     */
    function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Gets the region of the member
     *
     * @return string
     */
    function getRegion()
    {
        return $this->_region;
    }

    /**
     * Sets the region of the member
     *
     * @param string $region The new region for the member
     * @return void
     */
    function setRegion($region)
    {
        $this->_region = $region;
    }

    /**
     * Gets the seeking gender of the member
     *
     * @return string
     */
    function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * Sets the seeking gender of the member
     *
     * @param string $seeking The new seeking gender for the member
     * @return void
     */
    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * Gets the bio of the member
     *
     * @return string
     */
    function getBio()
    {
        return $this->_bio;
    }

    /**
     * Sets the bio of the member
     *
     * @param string $bio The new bio for the member
     * @return void
     */
    function setBio($bio)
    {
        $this->_bio = $bio;
    }
}
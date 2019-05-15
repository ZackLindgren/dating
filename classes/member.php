<?php

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

    function __construct($name, $species, $age, $gender, $number)
    {
        $this->_name = $name;
        $this->_species = $species;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_number = $number;
    }

    function getName()
    {
        return $this->_name;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function getSpecies()
    {
        return $this->_species;
    }

    function setSpecies($species)
    {
        $this->_species = $species;
    }

    function getAge()
    {
        return $this->_age;
    }

    function setAge($age)
    {
        $this->_age = $age;
    }

    function getGender()
    {
        return $this->_gender;
    }

    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    function getNumber()
    {
        return $this->_number;
    }

    function setNumber($number)
    {
        $this->_number = $number;
    }

    function getEmail()
    {
        return $this->_email;
    }

    function setEmail($email)
    {
        $this->_email = $email;
    }

    function getRegion()
    {
        return $this->_region;
    }

    function setRegion($region)
    {
        $this->_region = $region;
    }

    function getSeeking()
    {
        return $this->_seeking;
    }

    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    function getBio()
    {
        return $this->_bio;
    }

    function setBio($bio)
    {
        $this->_bio = $bio;
    }
}
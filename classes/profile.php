<?php

class Profile
{
    private $_name;
    private $_fName;
    private $_lName;
    private $_age;
    private $_phone;
    private $_email;
    private $_outDoor;
    private $_inDoor;

    public function __construct()
    {
        $this->_name = "";
        $this->_fName = "";
        $this->_lName = "";
        $this->_age = "";
        $this->_phone = "";
        $this->_email = "";
        $this->_outDoor = "";
        $this->_inDoor = "";
    }

    public function getName()
    {
        return $this->_name;
    }


    public function setName($fName, $lName)
    {
        $this->_name = $fName . " " . $lName;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getOutDoor()
    {
        return $this->_outDoor;
    }

    public function setOutDoor($outDoor)
    {
        $this->_outDoor = $outDoor;
    }

    public function getInDoor()
    {
        return $this->_inDoor;
    }

    public function setInDoor($inDoor)
    {
        $this->_inDoor = $inDoor;
    }


}
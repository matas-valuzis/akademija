<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2015.11.03
 * Time: 18:13
 */
namespace OOP;


class User
{
    private $name;
    private $last_name;
    private $email;
    private $gender;


    public function __construct($name = "", $last_name = "", $email = "", $gender = ""){
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }



}

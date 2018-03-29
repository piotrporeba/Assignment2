<?php

namespace App\Entity;

class Student
{
    private $id;
    private $firstName;
    private $surName;

    /**
     * Student constructor.
     * @param $id
     * @param $firstName
     * @param $surName
     */
    public function __construct($id, $firstName, $surName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->surName = $surName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSurName()
    {
        return $this->surName;
    }

    /**
     * @param mixed $surName
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;
    }




}
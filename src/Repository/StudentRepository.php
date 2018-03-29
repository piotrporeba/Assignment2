<?php

namespace App\Repository;

use App\Entity\Student;


class StudentRepository
{
    private $students=[];

    public function __construct()
    {
        $id=1;
        $s1 = new Student($id, 'matt', 'smith');
        $this->students[$id] =$s1;

        $id=2;
        $s2 = new Student($id, 'piotr', 'poreba');
        $this->students[$id] =$s2;

        $id=3;
        $s3 = new Student($id, 'pawel', 'poreba');
        $this->students[$id] =$s3;

    }

    public function findAll(){

        return $this->students;

    }

    public function find($id){

        if(array_key_exists($id, $this->students)){
            return $this->students[$id];
        }
        else{
            return null;
        }
    }


}
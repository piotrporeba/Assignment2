<?php


namespace App\Tests\Entity;


use App\Entity\User;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    public function testCreateObject(){
        //arrange
        $user = new User();

        // act

        //Assert
        $this->assertNotNull($user);
    }

    public function testSetId(){

        $user = new User();
        $expectedResult =1;
        $user->setId($expectedResult);

        $this->assertEquals($expectedResult, $user->getId());

    }

    public function testSetUserName(){

        $user = new User();
        $expectedResult ="John";
        $user->setUsername($expectedResult);

        $this->assertEquals($expectedResult, $user->getUsername());

    }

    public function testSetPassword(){

        $user = new User();
        $expectedResult ="password example";
        $user->setPassword($expectedResult);

        $this->assertEquals($expectedResult, $user->getPassword());

    }

    public function testSetRoles(){

        $user = new User();
        $expectedResult =[
            "admin",
            "superadmin",
            "user",
        ];
        $user->setRoles($expectedResult);

        $this->assertEquals($expectedResult, $user->getRoles());

    }

}
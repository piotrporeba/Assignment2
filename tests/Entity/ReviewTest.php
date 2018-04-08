<?php

namespace App\Tests\Entity;

use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{

    public function testCreateObject(){
        //arrange
        $review = new Review();

        // act

        //Assert
        $this->assertNotNull($review);
    }

    public function testSetIsPublic(){

        $review = new Review();
        $expectedResult =true;
        $review->setIsPublic($expectedResult);

        $this->assertEquals($expectedResult, $review->getIsPublic());

    }

    public function testSetScore(){

        $review = new Review();
        $expectedResult =5;
        $review->setScore($expectedResult);

        $this->assertEquals($expectedResult, $review->getScore());

    }

    public function testSetPrice(){

        $review = new Review();
        $expectedResult =100;
        $review->setPrice($expectedResult);

        $this->assertEquals($expectedResult, $review->getPrice());

    }

    public function testSetSummary(){

        $review = new Review();
        $expectedResult =" for me it was grreat fish";
        $review->setSummary($expectedResult);

        $this->assertEquals($expectedResult, $review->getSummary());

    }

    public function testSetRetailers(){

        $review = new Review();
        $expectedResult =[
            "aldi",
            "lidl",
            "dunnesStores",
        ];
        $review->setRetailers($expectedResult);

        $this->assertEquals($expectedResult, $review->getRetailers());

    }

    public function testSetDate(){

        $review = new Review();
        $expectedResult ="22.10.2017";
        $review->setDate($expectedResult);

        $this->assertEquals($expectedResult, $review->getDate());

    }

    public function testSetAuthor(){

        $review = new Review();
        $expectedResult ="John Snow";
        $review->setAuthor($expectedResult);

        $this->assertEquals($expectedResult, $review->getAuthor());

    }

    public function testSetId(){

        $review = new Review();
        $expectedResult =10;
        $review->setId($expectedResult);

        $this->assertEquals($expectedResult, $review->getId());

    }

    public function testSetProducts(){

        $review = new Review();
        $expectedResult =[
            "fish",
            "crab",
        ];
        $review->setProducts($expectedResult);

        $this->assertEquals($expectedResult, $review->getProducts());

    }




}
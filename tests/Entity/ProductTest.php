<?php

namespace App\tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testCreateObject(){
        //arrange
        $product = new Product();

        // act

        //Assert
        $this->assertNotNull($product);
    }

    public function testSetIngreedients(){

        $product = new Product();
        $expectedResult ="bones, eyes, meat";
        $product->setIngredients($expectedResult);

        $this->assertEquals($expectedResult, $product->getIngredients());

    }

    public function testSetSummary(){

        $product = new Product();
        $expectedResult ="tasty fist";
        $product->setSummary($expectedResult);

        $this->assertEquals($expectedResult, $product->getSummary());

    }

    public function testSetPrice(){

        $product = new Product();
        $expectedResult =10.5;
        $product->setPrice($expectedResult);

        $this->assertEquals($expectedResult, $product->getPrice());

    }

    public function testSetDescription(){

        $product = new Product();
        $expectedResult ="some description of fish";
        $product->setDescription($expectedResult);

        $this->assertEquals($expectedResult, $product->getDescription());

    }

    public function testSetTitle(){

        $product = new Product();
        $expectedResult ="Shark";
        $product->setTitle($expectedResult);

        $this->assertEquals($expectedResult, $product->getTitle());

    }

    public function testId(){

        $product = new Product();
        $expectedResult ="1";
        $product->setId($expectedResult);

        $this->assertEquals($expectedResult, $product->getId());

    }

    public function testReview(){

        $product = new Product();
        $expectedResult ="this was the best fish i ever had in my life";
        $product->setReview($expectedResult);

        $this->assertEquals($expectedResult, $product->getReview());

    }
    public function testScore(){

        $product = new Product();
        $expectedResult ="d:/photos/shark.jpg";
        $product->setPhoto($expectedResult);

        $this->assertEquals($expectedResult, $product->getPhoto());

    }

    public function testIsPublic(){

        $product = new Product();
        $expectedResult =true;
        $product->setIsPublic($expectedResult);

        $this->assertEquals($expectedResult, $product->getIsPublic());

    }
    public function test__toString(){

        $product = new Product();
        $expectedResult =null;
        $product->__toString();

        $this->assertEquals($expectedResult, $product->__toString());

    }


}
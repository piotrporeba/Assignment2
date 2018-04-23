<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductControllerTest extends WebTestCase

{

    public function testProductPageResponseAndContains(){
            //arrange
        $url = '/product/';
        $httpMethod = 'GET';
        $client = static::createClient();

        $expectedResult = Response::HTTP_OK;
        $expectedContent='seafood';
        $expectedContentToLowerCase = strtolower($expectedContent);

        //act
        $client->request($httpMethod, $url);
        $statusCode = $client->getResponse()->getStatusCode();
        $resultContent = $client->getResponse()->getContent();
        $resultContentToLowerCase = strtolower($resultContent);

        //assert
        $this->assertSame($expectedResult, $statusCode);
        $this->assertContains($expectedContentToLowerCase, $resultContentToLowerCase);
    }



    //////// Code to get something working
    public function testProductRedirectingPageContent() {
        // Arrange
        $url = '/product';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Redirecting';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }


    /////// Code copied from previous test version
    ///

    public function testProductPageResponseCodeMoved() {

        // Arrange

        $url = '/product';

        $httpMethod = 'GET';

        $client = static::createClient();

        // Assert

        $client->request($httpMethod, $url);

        // Assert

        $this->assertSame( Response::HTTP_MOVED_PERMANENTLY, $client->getResponse()->getStatusCode() );

    }



    public function testProductindexPageResponseCodeMoved() {

        // Arrange

        $url = '/product/19';

        $httpMethod = 'GET';

        $client = static::createClient();

        // Assert

        $client->request($httpMethod, $url);

        // Assert

        $this->assertNotNull($client->getResponse()->getStatusCode() );

    }



    public function testNewProductPageResponseCodeFound() {

        // Arrange

        $url = '/product/new';

        $httpMethod = 'GET';

        $client = static::createClient();

        // Assert

        $client->request($httpMethod, $url);

        // Assert

        $this->assertSame( Response::HTTP_FOUND, $client->getResponse()->getStatusCode() );

    }







    public function testProductRedirectingPageContent2() {

        // Arrange

        $url = '/product/';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'Seafood index';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testProductPageContent() {

        // Arrange

        $url = '/product/lamb chop';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'lean';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testNewProductPageContent() {

        // Arrange

        $url = '/product/lamb chop';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'title';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testEditProductPageContent() {

        // Arrange

        $url = '/product/lamb chop/edit';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'title';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }

}
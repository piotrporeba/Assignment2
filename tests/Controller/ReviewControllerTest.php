<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ReviewcontrollerTest extends WebTestCase

{
    public function testReviewPageResponseCodeMoved() {
        // Arrange
        $url = '/review';
        $httpMethod = 'GET';
        $client = static::createClient();
        // Assert
        $client->request($httpMethod, $url);
        // Assert
        $this->assertSame( Response::HTTP_MOVED_PERMANENTLY, $client->getResponse()->getStatusCode() );
    }



    public function testReviewRedirectingPageContent() {
        $url = '/review/';
        $httpMethod = 'GET';
        $client = static::createClient();

        $expectedResult = Response::HTTP_OK;
        $expectedContent='';
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

    public function testSpecificReviewPageContent() {
        // Arrange
        $url = '/review/shark';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'nice';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }

    public function testNewReviewPageContent() {
        // Arrange
        $url = '/review/new';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Redirecting';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }

    public function testEditReviewPageContent() {
        // Arrange
        $url = '/review/shark/edit';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Redirecting';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }

    public function testReviewPageResponseCodeMoved1() {

        // Arrange

        $url = '/review';

        $httpMethod = 'GET';

        $client = static::createClient();

        // Assert

        $client->request($httpMethod, $url);

        // Assert

        $this->assertSame( Response::HTTP_MOVED_PERMANENTLY, $client->getResponse()->getStatusCode() );

    }







    public function testReviewRedirectingPageContent1() {

        // Arrange

        $url = '/review/';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'Review index';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testSpecificReviewPageContent1() {

        // Arrange

        $url = '/review/shark';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'nice';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testNewReviewPageContent1() {

        // Arrange

        $url = '/review/new/';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'author';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }



    public function testEditReviewPageContent1() {

        // Arrange

        $url = '/review/shark/edit';

        $httpMethod = 'GET';

        $client = static::createClient();

        $searchText = 'author';

        // Act

        $client->request($httpMethod, $url);



        // Assert

        $this->assertContains( $searchText, $client->getResponse()->getContent() );

    }


}
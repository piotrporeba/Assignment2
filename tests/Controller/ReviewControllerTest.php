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
        // Arrange
        $url = '/review/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Redirecting';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
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
        $searchText = 'author';
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
        $searchText = 'author';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }


}
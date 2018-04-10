<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductControllerTest extends WebTestCase

{
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

    public function testNewProductPageResponseCodeOk() {
        // Arrange
        $url = '/product/new';
        $httpMethod = 'GET';
        $client = static::createClient();
        // Assert
        $client->request($httpMethod, $url);
        // Assert
        $this->assertSame( Response::HTTP_OK, $client->getResponse()->getStatusCode() );
    }



    public function testProductRedirectingPageContent() {
        // Arrange
        $url = '/product/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Redirecting';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }

    public function testProductPageContent() {
        // Arrange
        $url = '/product/{19}';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Product';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains($searchText, $client->getResponse()->getContent() );
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
        $url = '/product/shark/edit';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'title';
        // Act
        $client->request($httpMethod, $url);

        // Assert
        $this->assertContains( $searchText, $client->getResponse()->getContent() );
    }


}
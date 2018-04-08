<?php


namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class ProductControllerTest extends WebTestCase
{

    public function testProductControllerResponse_Moved()
    {
        // arrange
        $url = '/product';
        $httpMethod = 'GET';
        $client = static::createClient();

        //Act
        $client->request($httpMethod, $url);

        //Assert
        $this->assertSame(
            Response::HTTP_MOVED_PERMANENTLY,
            $client->getResponse()->getStatusCode()
        );
    }

    public function testProductControllerNewItemResponse_OK()
    {
        // arrange
        $url = '/product/new';
        $httpMethod = 'GET';
        $client = static::createClient();

        //Act
        $client->request($httpMethod, $url);

        //Assert
        $this->assertSame(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }


    public function testProductPageContainsRedirecting()
    {
        // arrange
        $url = '/product';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'redirecting';


        //Act
        $client->request($httpMethod, $url);
        $content = $client->getResponse()->getContent();

        // to lower case
        $searchTextLowerCase = strtolower($searchText);
        $contentLowerCase = strtolower($content);

        //Assert
        $this->assertContains($searchTextLowerCase, $contentLowerCase);
    }

    public function testProductShowPageContainsshark()
    {
        // arrange
        $url = '/product/shark';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'shark';


        //Act
        $client->request($httpMethod, $url);
        $content = $client->getResponse()->getContent();

        // to lower case
        $searchTextLowerCase = strtolower($searchText);
        $contentLowerCase = strtolower($content);

        //Assert
        $this->assertContains($searchTextLowerCase, $contentLowerCase);
    }

    public function testProductEditPageContainsshark()
    {
        // arrange
        $url = '/product/shark/edit';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'title';


        //Act
        $client->request($httpMethod, $url);
        $content = $client->getResponse()->getContent();

        // to lower case
        $searchTextLowerCase = strtolower($searchText);
        $contentLowerCase = strtolower($content);

        //Assert
        $this->assertContains($searchTextLowerCase, $contentLowerCase);
    }
}
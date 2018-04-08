<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class DefaultControllerTest extends WebTestCase
{

    public function testDefaultControllerResponse_OK()
    {
        // arrange
        $url = '/';
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

    public function testDefaultHomePageContainsWelcome()
    {
        // arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'welcome';


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
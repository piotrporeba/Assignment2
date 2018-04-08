<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class SecuritycontrollerTest extends WebTestCase
{

    public function testSecurityHomePageResponse_OK(){
        // arrange
        $url = '/login';
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

    public function testSecurityPageContainsLogin()
    {
        // arrange
        $url = '/security';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'login';


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
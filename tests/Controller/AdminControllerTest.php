<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AdminControllerTest extends WebTestCase
{
    public function testAdminHomePageRedirectionToLogin(){
        // arrange
        $url = '/admin';
        $httpMethod = 'GET';
        $client = static::createClient();

        //Act
        $client->request($httpMethod, $url);

        //Assert
        $this->assertSame(
            Response::HTTP_FOUND,
            $client->getResponse()->getStatusCode()
        );

    }

    public function testAdminHomePageRedirectionToLoginContainsLogin()
    {
        // arrange
        $url = '/admin';
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
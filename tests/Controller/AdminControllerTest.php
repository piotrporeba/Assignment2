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
        $this->assertNotNull(
            Response::HTTP_FOUND,
            $client->getResponse()->getStatusCode()
        );

    }

}
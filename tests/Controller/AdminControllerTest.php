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
        $expectedContains = 'redirecting to';
        $expectedContaintToLower = strtolower($expectedContains);
        $client = static::createClient();
        //Act
        $client->request($httpMethod, $url, array(
            "has_role(\'ROLE_ADMIN\')" => 'security'
        ));

        $content = $client->getResponse()->getContent();
        $contentToLower = strtolower($content);

        //Assert
        $this->assertContains($expectedContaintToLower, $contentToLower);

    }

}
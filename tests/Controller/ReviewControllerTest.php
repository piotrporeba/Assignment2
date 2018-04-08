<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class ReviewControllerTest extends WebTestCase
{

    public function testReviewControllerResponse_Moved()
    {
        // arrange
        $url = '/review';
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


    public function testReviewPageContainsRedirecting()
    {
        // arrange
        $url = '/review';
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

    public function testReviewShowPageContainsShark()
    {
        // arrange
        $url = '/review/shark';
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

    public function testReviewEditPageContainsTitle()
    {
        // arrange
        $url = '/review/shark/edit';
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
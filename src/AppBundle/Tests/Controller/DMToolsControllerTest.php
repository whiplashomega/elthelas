<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DMToolsControllerTest extends WebTestCase
{
    public function testRoutes()
    {
        $routes = array(
            '/dm',
            '/dm/initiative'
        );
        $client = static::createClient();
        //test our directory root first
        foreach($routes as $route) {
            $crawler = $client->request('GET', $route);
            $this->assertTrue($client->getResponse()->isSuccessful());            
        }  
    }
    public function testInitiative()
    {
      //A basic test to make sure the form submission is returning results
      $client = static::createClient();
      $crawler = $client->request('POST', '/dm');
    }
}
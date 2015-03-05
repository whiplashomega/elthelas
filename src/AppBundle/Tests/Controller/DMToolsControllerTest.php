<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DMToolsControllerTest extends WebTestCase
{
    public function testPageResponse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dm/initiative');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testInitiative()
    {
      
    }
}
<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReferencePagesControllerTest extends WebTestCase
{
  public function testRefIndex() {
    $client = static::createClient();
        $crawler = $client->request('GET', '/ref');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }
}

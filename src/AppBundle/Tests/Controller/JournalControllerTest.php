<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\Journal;

class JournalControllerTest extends WebTestCase
{
    public function testGetJournals()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getjournals/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
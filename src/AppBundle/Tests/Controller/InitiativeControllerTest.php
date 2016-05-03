<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InitiativeControllerTest extends WebTestCase
{
    public function testAddinitiative()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addInitiative');
    }

}

<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BudgetControllerTest extends WebTestCase
{
    public function testAddbudget()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addBudget');
    }

}

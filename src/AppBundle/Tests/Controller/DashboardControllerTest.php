<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    public function testJob()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/job');
    }

}

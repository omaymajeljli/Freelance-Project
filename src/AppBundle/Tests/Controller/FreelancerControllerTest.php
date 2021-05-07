<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FreelancerControllerTest extends WebTestCase
{
    public function testShowemployer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showEmployer');
    }

    public function testShowjob()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showJob');
    }

    public function testShowtask()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showTask');
    }

}

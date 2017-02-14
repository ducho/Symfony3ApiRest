<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class UsersControllerTest extends WebTestCase
{
    public function setUp()
    {
        $mock = new MockHandler([new Response(200, [])]);
        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);

		// or
	 /*  $this->client = new Client([
            'base_uri' => 'http://127.0.0.1:8000',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]);*/
    }

    public function testGetUsers()
    {
        $response = $this->client->get('/api/users', [
            'auth' => [
               'admin',
               'adminpass'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUser()
    {
        $response = $this->client->get('/api/users/1', [
            'auth' => [
                'admin',
                'adminpass'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPostUser()
    {
        $response = $this->client->post('/api/users', [
            'auth' => [
                'admin',
                'adminpass'
            ],
            'json' => [
                'name'     => 'Tony',
                'surname'  => 'Master'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPutUser()
    {
        $response = $this->client->put('/api/users/2', [
            'auth' => [
                'admin',
                'adminpass'
            ],
            'json' => [
                'name'     => 'Tony',
                'surname'  => 'Master'
            ]
    	]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeleteUser()
    {
        $response = $this->client->delete('/api/users/3', [
            'auth' => [
                'admin',
                'adminpass'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
}

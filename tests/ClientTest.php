<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    /**
     * @param mixed $uri
     *
     * @return SimpleClient
     */
    protected function createSimpleClientForAsync(string $method, $uri)
    {

        $client = $this->createMock(Client::class);
        $promise = $this->createMock(PromiseInterface::class);
        $client->expects($this->once())->method('requestAsync')->with($method, $uri)->willReturn($promise);
        $simpleClient = new SimpleClient();
        $simpleClient->setClient($client);
        return $simpleClient;
    }
    public function testGetAsync()
    {
        $simpleClient = $this->createSimpleClientForAsync('GET', 'test-path');
        $simpleClient->getAsync('test-path');
    }

    public function testDeleteAsync()
    {
        $simpleClient = $this->createSimpleClientForAsync('DELETE', 'test-path');
        $simpleClient->deleteAsync('test-path');

    }

    public function testPatch()
    {

    }

    public function testHeadAsync()
    {

    }

    public function testHead()
    {

    }

    public function testDelete()
    {

    }

    public function testPostAsync()
    {

    }

    public function testGetClient()
    {

    }

    public function testPutAsync()
    {

    }

    public function testRequestAsync()
    {

    }

    public function testSetClient()
    {

    }

    public function testPost()
    {

    }

    public function testRequest()
    {

    }

    public function testCreateClient()
    {
        $simpleClient = new SimpleClient();
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $simpleClient->createClient());
    }

    public function testGet()
    {

    }

    public function testPatchAsync()
    {

    }

    public function testPut()
    {

    }
}

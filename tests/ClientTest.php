<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    /**
     * @param string $method
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return SimpleClient
     */
    protected function createSimpleClientForAsync($method, $uri)
    {

        $client = $this->getMockBuilder(Client::class)->getMock();
        $promise = $this->getMockBuilder(PromiseInterface::class)->getMock();
        $client->expects($this->once())->method('requestAsync')->with($method, $uri)->willReturn($promise);
        $simpleClient = new SimpleClient();
        $simpleClient->setClient($client);
        return $simpleClient;
    }

    /**
     * @param string $method
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return SimpleClient
     */
    protected function createSimpleClient($method, $uri)
    {

        $client = $this->getMockBuilder(Client::class)->getMock();
        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $client->expects($this->once())->method('request')->with($method, $uri)->willReturn($response);
        $simpleClient = new SimpleClient();
        $simpleClient->setClient($client);
        return $simpleClient;
    }

    /**
     * @phpstan-return  void
     */
    public function testGetAsync()
    {
        $simpleClient = $this->createSimpleClientForAsync('GET', 'test-path');
        $simpleClient->getAsync('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testDeleteAsync()
    {
        $simpleClient = $this->createSimpleClientForAsync('DELETE', 'test-path');
        $simpleClient->deleteAsync('test-path');

    }

    /**
     * @phpstan-return  void
     */
    public function testPatch()
    {
        $simpleClient = $this->createSimpleClient('PATCH', 'test-path');
        $simpleClient->patch('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testHeadAsync()
    {

        $simpleClient = $this->createSimpleClientForAsync('HEAD', 'test-path');
        $simpleClient->headAsync('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testHead()
    {
        $simpleClient = $this->createSimpleClient('HEAD', 'test-path');
        $simpleClient->head('test-path');

    }

    /**
     * @phpstan-return  void
     */
    public function testDelete()
    {
        $simpleClient = $this->createSimpleClient('DELETE', 'test-path');
        $simpleClient->delete('test-path');

    }

    /**
     * @phpstan-return  void
     */
    public function testPostAsync()
    {

        $simpleClient = $this->createSimpleClientForAsync('POST', 'test-path');
        $simpleClient->postAsync('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testGetClient()
    {
        $simpleClient = new SimpleClient();
        self::assertInstanceOf(ClientInterface::class, $simpleClient->getClient());
    }

    /**
     * @phpstan-return  void
     */
    public function testPutAsync()
    {

        $simpleClient = $this->createSimpleClientForAsync('PUT', 'test-path');
        $simpleClient->putAsync('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testRequestAsync()
    {

        $simpleClient = $this->createSimpleClientForAsync('GET', 'test-path');
        $simpleClient->requestAsync('GET', 'test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testSetClient()
    {
        $simpleClient = new SimpleClient();
        $simpleClient->setClient(new Client());
        self::assertInstanceOf(ClientInterface::class, $simpleClient->getClient());
    }

    /**
     * @phpstan-return  void
     */
    public function testPost()
    {

        $simpleClient = $this->createSimpleClient('POST', 'test-path');
        $simpleClient->post('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testRequest()
    {

        $simpleClient = $this->createSimpleClient('GET', 'test-path');
        $simpleClient->request('GET', 'test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testCreateClient()
    {
        $simpleClient = new SimpleClient();
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $simpleClient->createClient());
    }

    /**
     * @phpstan-return  void
     */
    public function testGet()
    {

        $simpleClient = $this->createSimpleClient('GET', 'test-path');
        $simpleClient->get('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testPatchAsync()
    {

        $simpleClient = $this->createSimpleClientForAsync('PATCH', 'test-path');
        $simpleClient->patchAsync('test-path');
    }

    /**
     * @phpstan-return  void
     */
    public function testPut()
    {

        $simpleClient = $this->createSimpleClient('PUT', 'test-path');
        $simpleClient->put('test-path');
    }
}

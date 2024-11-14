<?php

namespace Zing\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\ClientTrait;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Basic Implementation of ClientAwareInterface.
 */
trait ClientAwareTrait
{
    /**
     * The client instance.
     *
     * @var \GuzzleHttp\ClientInterface|null
     */
    protected $client;

    /**
     * Sets a client.
     * @return void
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get the client instance.
     * @return ClientInterface
     */
    public function getClient()
    {
        if (! $this->client instanceof ClientInterface) {
            $this->client = $this->createClient();
        }

        return $this->client;
    }

    /**
     * Create the client instance.
     * @return ClientInterface
     */
    abstract public function createClient();

    /**
     * @param string $method
     * @param $uri
     * @param array $options
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method, $uri, array $options = [])
    {
        return $this->getClient()
            ->request($method, $uri, $options);
    }

    /**
     * @param string $method
     * @param $uri
     * @param array $options
     * @return PromiseInterface
     */
    public function requestAsync(string $method, $uri, array $options = [])
    {
        return $this->getClient()
            ->requestAsync($method, $uri, $options);
    }
}

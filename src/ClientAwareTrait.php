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
    use ClientTrait;

    /**
     * The client instance.
     *
     * @var \GuzzleHttp\ClientInterface|null
     */
    protected $client;

    /**
     * Sets a client.
     */
    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * Get the client instance.
     */
    public function getClient(): ClientInterface
    {
        if (! $this->client instanceof ClientInterface) {
            $this->client = $this->createClient();
        }

        return $this->client;
    }

    /**
     * Create the client instance.
     */
    abstract public function createClient(): ClientInterface;

    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->getClient()
            ->request($method, $uri, $options);
    }

    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->getClient()
            ->requestAsync($method, $uri, $options);
    }
}

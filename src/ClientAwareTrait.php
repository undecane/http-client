<?php

namespace Zing\HttpClient;

use GuzzleHttp\ClientInterface;

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
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get the client instance.
     *
     * @return \GuzzleHttp\ClientInterface
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
     *
     * @return \GuzzleHttp\ClientInterface
     */
    abstract public function createClient();

    /**
     * @param mixed $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request(string $method, $uri, array $options = [])
    {
        return $this->getClient()
            ->request($method, $uri, $options);
    }

    /**
     * @param mixed $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function requestAsync(string $method, $uri, array $options = [])
    {
        return $this->getClient()
            ->requestAsync($method, $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($uri, array $options = [])
    {
        return $this->request('GET', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function head($uri, array $options = [])
    {
        return $this->request('HEAD', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function put($uri, array $options = [])
    {
        return $this->request('PUT', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, array $options = [])
    {
        return $this->request('POST', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function patch($uri, array $options = [])
    {
        return $this->request('PATCH', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($uri, array $options = [])
    {
        return $this->request('DELETE', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAsync($uri, array $options = [])
    {
        return $this->requestAsync('GET', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function headAsync($uri, array $options = [])
    {
        return $this->requestAsync('HEAD', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putAsync($uri, array $options = [])
    {
        return $this->requestAsync('PUT', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postAsync($uri, array $options = [])
    {
        return $this->requestAsync('POST', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchAsync($uri, array $options = [])
    {
        return $this->requestAsync('PATCH', $uri, $options);
    }

    /**
     * @param string|\Psr\Http\Message\UriInterface $uri
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAsync($uri, array $options = [])
    {
        return $this->requestAsync('DELETE', $uri, $options);
    }
}

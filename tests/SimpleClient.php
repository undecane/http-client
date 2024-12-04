<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Zing\HttpClient\ClientAwareInterface;
use Zing\HttpClient\ClientAwareTrait;

class SimpleClient implements ClientAwareInterface, LoggerAwareInterface
{
    use ClientAwareTrait;
    use LoggerAwareTrait;

    /**
     * @var array<string, mixed>
     */
    private $config;

    /**
     * @param array<string, mixed> $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function createClient()
    {
        $handlerStack = HandlerStack::create(
            isset($this->config['http']['handler']) ? $this->config['http']['handler'] : null
        );
        if ($this->logger) {
            $handlerStack->push(Middleware::log($this->logger, new MessageFormatter('{target}')), 'log');
        }

        return new Client([
            'base_uri' => 'https://example.com/',
            'handler' => $handlerStack,
        ]);
    }
}

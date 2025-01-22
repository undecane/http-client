<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Zing\HttpClient\CacheAwareInterface;
use Zing\HttpClient\CacheAwareTrait;
use Zing\HttpClient\ClientAwareInterface;
use Zing\HttpClient\ClientAwareTrait;
use Zing\HttpClient\MessageFormatterAwareInterface;
use Zing\HttpClient\MessageFormatterAwareTrait;
use Zing\HttpClient\RecorderAwareInterface;
use Zing\HttpClient\RecorderAwareTrait;
use Zing\HttpClient\RecordFormatter;
use Zing\HttpClient\RecordMiddleware;

class SimpleClient implements ClientAwareInterface, LoggerAwareInterface, MessageFormatterAwareInterface, RecorderAwareInterface, CacheAwareInterface
{
    use CacheAwareTrait;
    use ClientAwareTrait;
    use LoggerAwareTrait;
    use MessageFormatterAwareTrait;
    use RecorderAwareTrait;

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
            $handlerStack->push(
                Middleware::log($this->logger, $this->messageFormatter ?: new MessageFormatter('{target}')),
                'log'
            );
        }

        if ($this->recorder) {
            $handlerStack->push(
                new RecordMiddleware($this->recorder, $this->recordFormatter ?: new RecordFormatter(['path'])),
                'record'
            );
        }

        return new Client([
            'base_uri' => 'https://example.com/',
            'handler' => $handlerStack,
        ]);
    }

    /**
     * @phpstan-return void
     */
    public function getToken()
    {
        if ($this->cache) {
            $this->cache->set('token', 'value', 60);
        }
    }
}

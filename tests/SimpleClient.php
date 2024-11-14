<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Zing\HttpClient\ClientAwareInterface;
use Zing\HttpClient\ClientAwareTrait;

class SimpleClient implements ClientAwareInterface
{
    use ClientAwareTrait;

    public function createClient(): ClientInterface
    {
        return new Client();
    }
}

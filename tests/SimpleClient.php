<?php

namespace Zing\HttpClient\Tests;

use GuzzleHttp\Client;
use Zing\HttpClient\ClientAwareInterface;
use Zing\HttpClient\ClientAwareTrait;

class SimpleClient implements ClientAwareInterface
{
    use ClientAwareTrait;

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function createClient()
    {
        return new Client();
    }
}

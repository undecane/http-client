<?php

namespace Zing\HttpClient\Tests;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    public function testCreateClient()
    {
        $simpleClient = new SimpleClient();
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $simpleClient->createClient());
    }
}

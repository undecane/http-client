<?php

namespace Zing\HttpClient\Tests;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    /**
     * @phpstan-return void
     */
    public function testCreateClient()
    {
        $simpleClient = new SimpleClient();
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $simpleClient->createClient());
    }
}

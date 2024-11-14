<?php

namespace Zing\HttpClient;

use GuzzleHttp\ClientInterface;

/**
 * Describes a client-aware instance.
 */
interface ClientAwareInterface
{
    /**
     * Sets a client instance on the object.
     * @return void
     */
    public function setClient(ClientInterface $client);

    /**
     * Get the client instance.
     * @return ClientInterface
     */
    public function getClient();

    /**
     * Create the client instance.
     * @return ClientInterface
     */
    public function createClient();
}

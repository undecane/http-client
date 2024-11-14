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
     */
    public function setClient(ClientInterface $client): void;

    /**
     * Get the client instance.
     */
    public function getClient(): ClientInterface;

    /**
     * Create the client instance.
     */
    public function createClient(): ClientInterface;
}

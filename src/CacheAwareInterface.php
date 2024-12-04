<?php

namespace Zing\HttpClient;

use Psr\SimpleCache\CacheInterface;

/**
 * Describes a cache-aware instance.
 */
interface CacheAwareInterface
{
    /**
     * Sets a cache instance on the object.
     *
     * @phpstan-return void
     */
    public function setCache(CacheInterface $cache);
}

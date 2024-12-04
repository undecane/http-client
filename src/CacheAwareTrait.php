<?php

namespace Zing\HttpClient;

use Psr\SimpleCache\CacheInterface;

/**
 * Basic Implementation of CacheAwareInterface.
 */
trait CacheAwareTrait
{
    /**
     * The cache instance.
     *
     * @var \Psr\SimpleCache\CacheInterface|null
     */
    protected $cache;

    /**
     * Sets a cache.
     *
     * @phpstan-return void
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
    }
}

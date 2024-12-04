<?php

namespace Zing\HttpClient;

/**
 * Basic Implementation of MessageFormatterAwareInterface.
 */
trait MessageFormatterAwareTrait
{
    /**
     * The message formatter instance.
     *
     * @var \GuzzleHttp\MessageFormatterInterface|\GuzzleHttp\MessageFormatter|null
     */
    protected $messageFormatter;

    /**
     * Sets a message formatter.
     *
     * @param \GuzzleHttp\MessageFormatterInterface|\GuzzleHttp\MessageFormatter $messageFormatter
     *
     * @phpstan-return void
     */
    public function setMessageFormatter($messageFormatter)
    {
        $this->messageFormatter = $messageFormatter;
    }
}

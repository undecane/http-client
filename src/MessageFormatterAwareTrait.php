<?php

namespace Zing\HttpClient;

use GuzzleHttp\MessageFormatterInterface;

/**
 * Basic Implementation of MessageFormatterAwareInterface.
 */
trait MessageFormatterAwareTrait
{
    /**
     * The message formatter instance.
     *
     * @var \GuzzleHttp\MessageFormatterInterface|null
     */
    protected $messageFormatter;

    /**
     * Sets a message formatter.
     *
     * @phpstan-return void
     */
    public function setMessageFormatter(MessageFormatterInterface $messageFormatter)
    {
        $this->messageFormatter = $messageFormatter;
    }
}

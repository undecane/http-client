<?php

namespace Zing\HttpClient;

use GuzzleHttp\MessageFormatterInterface;

/**
 * Describes a message formatter-aware instance.
 */
interface MessageFormatterAwareInterface
{
    /**
     * Sets a message formatter instance on the object.
     *
     * @phpstan-return void
     */
    public function setMessageFormatter(MessageFormatterInterface $messageFormatter);
}

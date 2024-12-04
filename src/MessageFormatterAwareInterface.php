<?php

namespace Zing\HttpClient;

/**
 * Describes a message formatter-aware instance.
 */
interface MessageFormatterAwareInterface
{
    /**
     * Sets a message formatter instance on the object.
     *
     * @param \GuzzleHttp\MessageFormatterInterface|\GuzzleHttp\MessageFormatter $messageFormatter
     *
     * @phpstan-return void
     */
    public function setMessageFormatter($messageFormatter);
}

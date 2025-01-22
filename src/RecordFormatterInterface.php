<?php

namespace Zing\HttpClient;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface RecordFormatterInterface
{
    /**
     * @return array<string, mixed>
     */
    public function format(
        RequestInterface $request,
        ?ResponseInterface $response = null,
        ?\Throwable $throwable = null
    );
}

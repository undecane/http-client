<?php

namespace Zing\HttpClient;

interface RecordFormatterInterface
{
    /**
     * @param \Psr\Http\Message\RequestInterface $request Request that was sent
     * @param \Psr\Http\Message\ResponseInterface|null $response Response that was received
     * @param \Throwable|null $throwable
     *
     * @return array<string, mixed>
     */
    public function format($request, $response = null, $throwable = null);
}

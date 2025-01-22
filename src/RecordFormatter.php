<?php

namespace Zing\HttpClient;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RecordFormatter implements RecordFormatterInterface
{
    /**
     * @var array<string> Attributes used to format record
     */
    private $attributes;

    /**
     * @param array<string> $attributes Record attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Returns a formatted record.
     *
     * @param \Psr\Http\Message\RequestInterface $request Request that was sent
     * @param \Psr\Http\Message\ResponseInterface|null $response Response that was received
     * @param \Throwable|null $throwable
     *
     * @return array<string, mixed>
     */
    public function format(RequestInterface $request, $response = null, $throwable = null)
    {
        $cache = [];

        foreach ($this->attributes as $attribute) {
            if (isset($cache[$attribute])) {
                continue;
            }

            $result = $this->resolve($attribute, $request, $response, $throwable);

            $cache[$attribute] = $result;
        }

        return $cache;
    }

    /**
     * @param string $column
     * @param \Psr\Http\Message\ResponseInterface|null $response Response that was received
     * @param \Throwable|null $throwable
     *
     * @return mixed
     */
    protected function resolve($column, RequestInterface $request, $response = null, $throwable = null)
    {
        $result = '';

        switch ($column) {
            case 'request':
                $result = $this->message($request);

                break;

            case 'response':
                $result = $response instanceof ResponseInterface ? $this->message($response) : null;

                break;

            case 'path':
                $result = $request->getUri()
                    ->getPath();

                break;

            case 'method':
                $result = $request->getMethod();

                break;

            case 'code':
                $result = $response instanceof ResponseInterface ? $response->getStatusCode() : null;

                break;

            case 'error':
                $result = $throwable instanceof \Throwable ? $this->error($throwable) : null;

                break;

            default:
                // handle prefixed dynamic headers
                if (strpos($column, 'req_header_') === 0) {
                    $result = $request->getHeaderLine(substr($column, 11));
                } elseif (strpos($column, 'res_header_') === 0) {
                    $result = $response instanceof ResponseInterface
                        ? $response->getHeaderLine(substr($column, 11))
                        : null;
                }
        }

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    private function message(MessageInterface $message)
    {
        $data = [
            'body' => (string) $message->getBody(),
        ];
        $contentType = isset($message->getHeader('Content-Type')[0]) ? $message->getHeader('Content-Type')[0] : '';
        if (str_contains($contentType, 'json')) {
            $contents = $data['body'];
            $result = json_decode($contents, true);
            unset($data['body']);
            $data['json'] = $result;
        }

        foreach ($message->getHeaders() as $name => $values) {
            $data['headers'][$name] = implode(', ', $values);
        }

        if ($message instanceof RequestInterface) {
            $data['start_line'] = trim($message->getMethod() . ' ' . $message->getRequestTarget())
                . ' HTTP/' . $message->getProtocolVersion();
            if (! $message->hasHeader('host')) {
                $data['headers']['Host'] = $message->getUri()->getHost();
            }
        } elseif ($message instanceof ResponseInterface) {
            $data['status_line'] = 'HTTP/' . $message->getProtocolVersion() . ' '
                . $message->getStatusCode() . ' '
                . $message->getReasonPhrase();
        }

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    private function error(\Throwable $throwable)
    {
        return [
            'message' => $throwable->getMessage(),
            'exception' => \get_class($throwable),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
            'trace' => array_map(static function (array $trace) {
                unset($trace['args']);

                return $trace;
            }, $throwable->getTrace()),
        ];
    }
}

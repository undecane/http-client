<?php

namespace Zing\HttpClient;

use GuzzleHttp\Exception\RequestException;

use function GuzzleHttp\Promise\rejection_for;

class RecordMiddleware
{
    /**
     * @var \Zing\HttpClient\Recorder
     */
    private $recorder;

    /**
     * @var \Zing\HttpClient\RecordFormatter
     */
    private $recordFormatter;

    public function __construct(Recorder $recorder, RecordFormatter $recordFormatter)
    {
        $this->recorder = $recorder;
        $this->recordFormatter = $recordFormatter;
    }

    /**
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function ($request, array $options) use ($handler) {
            return $handler($request, $options)
                ->then(
                    function ($response) use ($request) {
                        $record = $this->recordFormatter->format($request, $response);
                        $this->recorder->record($record);

                        return $response;
                    },
                    function ($reason) use ($request) {
                        $response = $reason instanceof RequestException
                            ? $reason->getResponse()
                            : null;
                        $message = $this->recordFormatter->format($request, $response, $reason);
                        $this->recorder->record($message);

                        return rejection_for($reason);
                    }
                );
        };
    }
}

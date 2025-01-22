<?php

namespace Zing\HttpClient;

/**
 * Basic Implementation of RecorderAwareInterface.
 */
trait RecorderAwareTrait
{
    /**
     * The recorder instance.
     *
     * @var \Zing\HttpClient\Recorder|null
     */
    protected $recorder;

    /**
     * The record formatter instance.
     *
     * @var \Zing\HttpClient\RecordFormatter|null
     */
    protected $recordFormatter;

    /**
     * Sets a recorder and record formatter.
     *
     * @param \Zing\HttpClient\RecordFormatter|null $recordFormatter
     *
     * @phpstan-return void
     */
    public function setRecorder(Recorder $recorder, $recordFormatter = null)
    {
        $this->recorder = $recorder;
        if ($recordFormatter !== null) {
            $this->recordFormatter = $recordFormatter;
        }
    }
}

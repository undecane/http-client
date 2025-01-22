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
     * @param \Zing\HttpClient\Recorder $recorder
     * @param \Zing\HttpClient\RecordFormatter $recordFormatter
     *
     * @phpstan-return void
     */
    public function setRecorder($recorder, $recordFormatter = null)
    {
        $this->recorder = $recorder;
        if ($recordFormatter !== null) {
            $this->recordFormatter = $recordFormatter;
        }
    }
}

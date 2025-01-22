<?php

namespace Zing\HttpClient;

/**
 * Describes a recorder-aware instance.
 */
interface RecorderAwareInterface
{
    /**
     * Sets a recorder and record formatter instance on the object.
     *
     * @param \Zing\HttpClient\Recorder $recorder
     * @param \Zing\HttpClient\RecordFormatter|null $recordFormatter
     *
     * @phpstan-return void
     */
    public function setRecorder($recorder, $recordFormatter = null);
}

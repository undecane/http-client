<?php

namespace Zing\HttpClient;

interface Recorder
{
    /**
     * @param array<string, mixed> $record
     *
     * @phpstan-return void
     */
    public function record(array $record);
}

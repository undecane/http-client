<?php

namespace Zing\HttpClient;

interface Recorder
{
    /**
     * @param array<string, mixed> $record
     */
    public function record(array $record): void;
}

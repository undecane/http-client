<?php

namespace Zing\HttpClient\Tests;

if (class_exists('PHPUnit_Framework_TestCase') && ! class_exists(BaseTestCase::class)) {
    class_alias('PHPUnit_Framework_TestCase', BaseTestCase::class);
}

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
}

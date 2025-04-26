<?php

namespace Alyou\Belajar\Php\Logging2;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testContext()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(
            new RotatingFileHandler(
                __DIR__ . '/log/test.log',
                10,


            )
        );
        $logger->info('This is an info message', ['context' => 'test']);
        $logger->error('This is an error message', ['context' => 'test']);
        $logger->debug('This is a debug message', ['context' => 'test']);



        self::assertNotNull($logger);
    }
}
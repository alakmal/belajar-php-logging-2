<?php

namespace Alyou\Belajar\Php\Logging2;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testContext()
    {
        $logger = new Logger(LoggerTest::class);

        $handler = new StreamHandler(__DIR__ . "/../error.log");
        $handler->setFormatter(new JsonFormatter());
        $logger->pushHandler($handler);

        $logger->info("Info message", ["username" => "Khnnedy"]);
        $logger->warning("Warning message", ["password" => "Khnnedy"]);

        self::assertNotNull($logger);
    }
}
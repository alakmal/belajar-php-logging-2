<?php

namespace Alyou\Belajar\Php\Logging2;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testContext()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler(("php://stdout")));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log"));

        $logger->info("Info message", ["username" => "Khnnedy"]);
        $logger->warning("Warning message", ["password" => "Khnnedy"]);

        self::assertNotNull($logger);
    }
}
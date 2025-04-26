<?php


namespace Alyou\Belajar\Php\Logging2;

use Monolog\Logger;


use Monolog\Handler\StreamHandler;

class LoggerTest extends \PHPUnit\Framework\TestCase
{

    public function testHandler()
    {

        $logger = new Logger((LoggerTest::class));
        $logger->pushHandler((new StreamHandler("php://stderr")));
        $logger->pushHandler(new StreamHandler((__DIR__ . "/../application.log")));

        self::assertEquals(2, sizeof(($logger->getHandlers())));
    }

    public function testLogging()
    {

        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        $logger->info("This is an info message");

        self::assertNotNull($logger);
    }
}
<?php

namespace Alyou\Belajar\Php\Logging2;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testContext()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler(("php://stdout")));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log"));

        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                "author" => "Alyou",
                "application" => "Belajar PHP Logging",
            ];

            return $record;
        });
        $logger->info(("test processor"));
        self::assertNotNull($logger);
    }

    public function testProcessorMonolog()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler(("php://stdout")));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                "author" => "Alyou",
                "application" => "Belajar PHP Logging",
            ];

            return $record;
        });

        $logger->info("test processor", ["context" => "this is a context"]);
        self::assertNotNull($logger);
    }
}
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

        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());

        for ($i = 0; $i < 1000; $i++) {
            $logger->info("Logo-{$i}");

            if ($i % 100 == 0) {
                $logger->reset();
            }
        }
        self::assertNotNull($logger);
    }
}
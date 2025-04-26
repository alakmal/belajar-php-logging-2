<?php

use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testLogMessage()
    {
        $logger = new Logger("ProgrammeZamanNow");

        self::assertNotNull($logger);


        // // Check if the log file exists and contains the expected message
        // $this->assertFileExists('app.log');
        // $this->assertStringContainsString("Test message", file_get_contents('app.log'));
    }

    public function testLoggerWithName()
    {
        $logger = new Logger(LoggerTest::class);

        self::assertNotNull($logger);
    }
}
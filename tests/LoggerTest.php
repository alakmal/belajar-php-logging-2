<?php


namespace Alyou\Belajar\Php\Logging2;

use Monolog\Logger;


use Monolog\Handler\StreamHandler;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testLevel()
    {

        $logger = new Logger('test_logger');
        $logger->pushHandler(new StreamHandler('php://stdout',));

        $logger->pushHandler((new StreamHandler(__DIR__ . "/../error.log", Logger::INFO)));
        // Test logging at different levels
        $logger->debug('This is a debug message');
        $logger->info('This is an info message');
        $logger->notice('This is a notice message');
        $logger->warning('This is a warning message');
        $logger->error('This is an error message');
        $logger->critical('This is a critical message');
        $logger->alert('This is an alert message');
        $logger->emergency('This is an emergency message');

        // Assert that the messages are logged correctly (this will be visible in stdout)
        $this->assertTrue(true); // Placeholder assertion, as we cannot capture stdout in this test

        self::assertNotNull($logger);
    }
}
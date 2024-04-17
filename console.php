<?php
declare(strict_types=1);

require ("vendor/autoload.php");

use Factories\OperationFactory;
use Inputs\CommandLineInput;
use Loggers\FileLogger;
use Processors\FileProcessor;

try {
    [$action, $file] = CommandLineInput::parseOptions();
    $operation = OperationFactory::createOperation($action);
    $logger = new FileLogger();
    $processor = new FileProcessor($logger);
    $processor->process($file, $operation);

    return CommandLineInput::COMMAND_SUCCESS;
} catch (\Exception $exception) {
    echo $exception->getMessage();

    return CommandLineInput::COMMAND_FAILURE;
}

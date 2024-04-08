<?php
declare(strict_types=1);

require_once("loader.php");
require_once("Inputs/CommandLineInput.php");

try {
    [$action, $file] = \Inputs\CommandLineInput::parseOptions();
    $operation = \Factories\OperationFactory::createOperation($action);
    $logger = new \Loggers\FileLogger();
    $processor = new \Processors\FileProcessor($logger);
    $processor->process($file, $operation);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

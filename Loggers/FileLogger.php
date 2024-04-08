<?php
declare(strict_types=1);

namespace Loggers;

use Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function log(string $message): void
    {
        $fp = fopen("log/log.txt", "a+");
        fwrite($fp, $message . "\n");
        fclose($fp);
    }
}

<?php
declare(strict_types=1);

namespace Loggers;

use Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface
{
    /**
     * @param array $message
     *
     * @return void
     */
    public function log(array $message): void
    {
        $fp = fopen("log/log.txt", "w");
        fwrite($fp, implode('', $message));
        fclose($fp);
    }
}

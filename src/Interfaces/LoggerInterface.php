<?php
declare(strict_types=1);

namespace Interfaces;

interface LoggerInterface
{
    /**
     * @param string $message
     * @return void
     */
    public function log(array $message): void;
}
<?php
declare(strict_types=1);

namespace Interfaces;

interface LoggerInterface
{
    public function log(string $message): void;
}
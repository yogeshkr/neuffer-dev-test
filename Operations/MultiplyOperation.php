<?php
declare(strict_types=1);

namespace Operations;
use Interfaces\OperationInterface;

class MultiplyOperation implements OperationInterface
{
    public function execute(int $a, int $b): ?int
    {
        return $a * $b;
    }

    public function isValid(int $a, int $b): bool
    {
        return $a > 0 && $b > 0;
    }

    public function getClassName(): string
    {
        return 'Multiply Operation';
    }
}

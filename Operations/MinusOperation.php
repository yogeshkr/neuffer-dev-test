<?php
declare(strict_types=1);

namespace Operations;
use Interfaces\OperationInterface;

class MinusOperation implements OperationInterface
{
    public function execute(int $a, int $b): ?int
    {
        return $a - $b;
    }

    public function isValid(int $a, int $b): bool
    {
        return (($a - $b) > 0);
    }

    public function getClassName(): string
    {
        return 'Minus Operation';
    }
}

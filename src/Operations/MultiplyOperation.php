<?php
declare(strict_types=1);

namespace Operations;
use Interfaces\OperationInterface;

class MultiplyOperation implements OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int|null
     */
    public function execute(int $a, int $b): ?int
    {
        return $a * $b;
    }

    /**
     * @param int $a
     * @param int $b
     * @return bool
     */
    public function isValid(int $a, int $b): bool
    {
        return $a > 0 && $b > 0;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return 'Multiply Operation';
    }
}

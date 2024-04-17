<?php
declare(strict_types=1);

namespace Operations;
use Interfaces\OperationInterface;

class DivisionOperation implements OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int|null
     */
    public function execute(int $a, int $b): ?int
    {
        return $a / $b;
    }

    /**
     * @param int $a
     * @param int $b
     * @return bool
     */
    public function isValid(int $a, int $b): bool
    {
        return match (true) {
            $a <= 0 => false,
            $b <= 0 => false,
            $a % $b !== 0 => false,
            default => true
        };
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return 'Division Operation';
    }
}

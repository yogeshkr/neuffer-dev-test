<?php
declare(strict_types=1);

namespace Interfaces;

interface OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int|null
     */
    public function execute(int $a, int $b): ?int;

    /**
     * @param int $a
     * @param int $b
     * @return bool
     */
    public function isValid(int $a, int $b): bool;

    /**
     * @return string
     */
    public function getClassName(): string;
}

<?php
declare(strict_types=1);

namespace Interfaces;

interface OperationInterface
{
    public function execute(int $a, int $b): ?int;

    public function isValid(int $a, int $b): bool;

    public function getClassName(): string;
}

<?php
declare(strict_types=1);

namespace Factories;

use Interfaces\OperationInterface;
use Operations\DivisionOperation;
use Operations\MinusOperation;
use Operations\MultiplyOperation;
use Operations\PlusOperation;

class OperationFactory
{
    public static function createOperation(string $action): OperationInterface
    {
        return match ($action) {
            "plus" => new PlusOperation(),
            "minus" => new MinusOperation(),
            "multiply" => new MultiplyOperation(),
            "division" => new DivisionOperation(),
            default => throw new \InvalidArgumentException("Wrong action is selected"),
        };
    }
}

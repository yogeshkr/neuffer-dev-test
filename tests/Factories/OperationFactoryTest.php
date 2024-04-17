<?php
declare(strict_types=1);

namespace Tests;

use Factories\OperationFactory;
use Interfaces\OperationInterface;
use JetBrains\PhpStorm\NoReturn;
use Operations\DivisionOperation;
use Operations\MinusOperation;
use Operations\MultiplyOperation;
use Operations\PlusOperation;
use PHPUnit\Framework\TestCase;

class OperationFactoryTest extends TestCase
{
    /**
     * @dataProvider createOperationDataProvider
     * @param string $action
     * @param OperationInterface $expected
     * @return void
     */
    public function testCreateOperation(string $action, OperationInterface $expected): void
    {
        $result = OperationFactory::createOperation($action);
        $this->assertEquals($result, $expected);
    }

    /**
     * @return array[]
     */
    public static function createOperationDataProvider(): array
    {
        return [
            ["plus", new PlusOperation()],
            ["minus", new MinusOperation()],
            ["multiply", new MultiplyOperation()],
            ["division", new DivisionOperation()],
        ];
    }
}

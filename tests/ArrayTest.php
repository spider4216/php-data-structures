<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\ArrayStructure\ArrayStructure;

final class ArrayTest extends TestCase
{
    public function testOverCapacity(): void
    {
        $this->expectException(\Exception::class);

        (new ArrayStructure(4))
            ->push(263)
            ->push(443)
            ->push(873)
            ->push(13698)
            ->push(14698);
    }

    public function testCapacity(): void
    {
        $array = (new ArrayStructure(3))
            ->push(263)
            ->push(443)
            ->push(873);

        $this->assertEquals(3, $array->capacity());
    }

    public function testFilledValues(): void
    {
        $array = (new ArrayStructure(6))
            ->push(263)
            ->push(443);

        $this->assertEquals(2, $array->filledCount());
    }

    public function testFind(): void
    {
        $array = (new ArrayStructure(5))
            ->push(263)
            ->push(443)
            ->push(873)
            ->push(13698)
            ->push(14698);

        $this->assertEquals(3, $array->find(13698));
    }
}


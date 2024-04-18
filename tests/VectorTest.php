<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\Vector\Vector;

class VectorTest extends TestCase
{
    public function testIcreaseDefaultCapacity()
    {
        $vector = (new Vector(3))
            ->push(263)
            ->push(443)
            ->push(873);

        $capacity = $vector->capacity();

        $this->assertEquals(3, $capacity);

        $vector->push(944);

        $capacity = $vector->capacity();

        $this->assertEquals(6, $capacity);
    }

    public function testIcreaseCustomCapacity()
    {
        $vector = (new Vector(3, 3))
            ->push(263)
            ->push(443)
            ->push(873);

        $capacity = $vector->capacity();

        $this->assertEquals(3, $capacity);

        $vector->push(944);

        $capacity = $vector->capacity();

        $this->assertEquals(9, $capacity);
    }

    public function testFilledAfterIcreaseCapacity()
    {
        $vector = (new Vector(2))
            ->push(263);

        $filledCount = $vector->filledCount();

        $this->assertEquals(1, $filledCount);

        $vector
            ->push(944)
            ->push(14890);

        $filledCount = $vector->filledCount();

        $this->assertEquals(3, $filledCount);
    }
}


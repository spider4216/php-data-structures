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

    public function testBubbleSort(): void
    {
        $array = (new ArrayStructure(6))
            ->push(14698)
            ->push(13698)
            ->push(443)
            ->push(873)
            ->push(263)
            ->push(999949);

        $beforeSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([0,1,2,3,4,5], $beforeSort);

        $array->bubbleSort();

        $afterSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([4,3,1,2,0,5], $afterSort);
    }

    public function testSortAndBinarySearch()
    {
        $array = (new ArrayStructure(6))
            ->push(14698)
            ->push(13698)
            ->push(443)
            ->push(873)
            ->push(263)
            ->push(999949);

        /**
         * В не упорядоченном массиве двоичный поиск
         * работает не корректно, поэтому результат
         * может быть неожиданным
         */
        $searchResult = $array->find(873);

        $this->assertNull($searchResult);

        /**
         * После упорядочивания (сортировки) результат
         * двоичного поиска становится корректным
         */
        $array->bubbleSort();

        $searchResult = $array->find(873);

        $this->assertEquals(2, $searchResult);
    }

    public function testSelectionSort(): void
    {
        $array = (new ArrayStructure(6))
            ->push(14698)
            ->push(13698)
            ->push(443)
            ->push(873)
            ->push(263)
            ->push(999949);

        $beforeSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([0,1,2,3,4,5], $beforeSort);

        $array->selectSort();

        $afterSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([4,3,1,2,0,5], $afterSort);
    }

    public function testInsertSort(): void
    {
        $array = (new ArrayStructure(6))
            ->push(14698)
            ->push(13698)
            ->push(443)
            ->push(873)
            ->push(263)
            ->push(999949);

        $beforeSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([0,1,2,3,4,5], $beforeSort);

        $array->insertSort();

        $afterSort = [
            $array->linearSearch(14698),
            $array->linearSearch(13698),
            $array->linearSearch(443),
            $array->linearSearch(873),
            $array->linearSearch(263),
            $array->linearSearch(999949),
        ];

        $this->assertEquals([4,3,1,2,0,5], $afterSort);
    }
}


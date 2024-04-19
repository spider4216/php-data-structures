<?php

namespace App\Ysiroteno\PhpDataStructures\ArrayStructure;

/**
 * Реализация упорядоченного массива
 * Критерии: фиксированная длина и однотипность
 * Дыры в массиве запрещены, поэтому любое удаление
 * должно смещать элементы
 */
class ArrayStructure implements ArrayInterface
{
    protected int $capacity = 0;

    protected array $data = [];

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->init();
    }

    protected function init(): void
    {
        /**
         * Резервируем ячейки памяти для каждого элемента
         * в пределах фиксированного диапазона
         */
        for ($i = 0; $i < $this->capacity; $i++) {
            $this->data[$i] = null;
        }
    }

    /**
     * В данной реализации массивабыло решено не использовать курсор,
     * чтобы распознать близжайший свободный элемент, а использовать линейный
     * поиск
     *
     * Здесь очень не эффективная вставка: O(N)
     * Чтобы достигнуть эффективности О(1) можно использовать
     * внутренний курсор
     *
     * {@inheritDoc}
     * @see \App\Ysiroteno\PhpDataStructures\ArrayStructure\ArrayInterface::push()
     */
    public function push($value): self
    {
        $nullIndex = 0;

        while (true) {
            if (! array_key_exists($nullIndex, $this->data)) {
                throw new \Exception('Array overfilling error');
            }

            if ($this->data[$nullIndex] === null) {
                $this->data[$nullIndex] = new ArrayItem($value);
                break;
            }

            $nullIndex++;
        }

        return $this;
    }

    /**
     * Реализация бинарного поиска
     * Чтобы метод отработал корректно, необходимо
     * Чтобы значения были упорядочены. Если они не упорядочены
     * то есть два варианта:
     *
     * 1. Сначала применить сортировку, а затемвоспользоваться
     * методом
     * 2. Воспользоваться линейным поиском
     *
     * Также в данном алгоритме отсутствует логика фильтрации
     * незаполненных элементов, т.е. если есть непроинициализированные ячейки
     * (точнее null) то поиск завершится ошибкой, нужно чтобы
     * вся структура была заполненной. В противном случае нужн сначала
     * осуществить фильтрацию, а затем поиск
     *
     * @param $value
     * @return int|NULL
     */
    public function find($value): ?int
    {
        $lowSlice = 0;
        $upSlice = $this->capacity - 1;

        while (true) {
            $cursor = (int) (($lowSlice + $upSlice) / 2);

            if ($this->data[$cursor]->getValue() === $value) {
                /**
                 * Если элемент найден в заданном диапазоне
                 * то возвращаем его индекс
                 */
                return $cursor;
            } elseif ($lowSlice > $upSlice) {
                /**
                 * Если вышли за пределы диапазона, то
                 * элемент не найден, возвращаем пустоту
                 */
                return null;
            } else {
                /**
                 * Производим деление заданного
                 * диапазона
                 */
                if ($this->data[$cursor]->getValue() < $value) {
                    /**
                     * Искомое значение находится в
                     * верхней половине
                     */
                    $lowSlice = $cursor + 1;
                } else {
                    /**
                     * Искомое значение находится в
                     * нижней половине
                     */
                    $upSlice = $cursor - 1;
                }
            }
        }
    }

    public function linearSearch($value): ?string
    {
        foreach ($this->data as $key => $item) {
            /** @var ArrayItem $item */
            if ($item->getValue() === $value) {
                return $key;
            }
        }

        return null;
    }

    public function filledCount(): int
    {
        $nullIndex = 0;

        while (true) {
            if (! array_key_exists($nullIndex, $this->data)) {
                return $nullIndex;
            }

            if ($this->data[$nullIndex] === null) {
                return $nullIndex;
            }

            $nullIndex++;
        }
    }

    public function capacity(): int
    {
        return $this->capacity;
    }

    public function bubbleSort(): void
    {
        $limit = $this->capacity - 1;
        /**
         * Внешний обратный цикл. Поскольку самый
         * большой элемент оказывается в самом правом
         * краю, каждая итерация должна уменьшать счетчик
         * на единицу, поскольку каждый раз крайний правый
         * элемент можно считать отсортированым
         */
        for ($out = $limit; $out > 0; $out--) {
            /**
             * Внутренний прямой цикл, перибираем до крайнего
             * отсортированного элемента массива
             */
            for ($in = 0; $in < $out; $in++) {
                /**
                 * Если значение текущего элемента больше,
                 * то порядок можно считать нарушенным и нужно
                 * поменять элементы местами
                 */
                if ($this->data[$in] > $this->data[$in + 1]) {
                    $temp = $this->data[$in];
                    $this->data[$in] = $this->data[$in + 1];
                    $this->data[$in + 1] = $temp;
                }
            }
        }
    }
}


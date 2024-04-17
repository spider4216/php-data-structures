<?php
namespace App\Ysiroteno\PhpDataStructures\Vector;

use App\Ysiroteno\PhpDataStructures\ArrayStructure\ArrayStructure;

class Vector extends ArrayStructure
{
    /**
     * Число на которое нужно умножить
     * существующий capacity
     *
     * @var integer
     */
    protected int $increment = 2;

    public function __construct(int $capacity, int $increment = 2)
    {
        $this->increment = $increment;
        parent::__construct($capacity);
    }

    public function push($value): self
    {
        try {
            $res = parent::push($value);
        } catch (\Exception $e) {
            $this->extendArray();
            $res = parent::push($value);
        }

        return $res;
    }

    protected function extendArray()
    {
        /**
         * Делаем новый диапазон
         *
         * @var int $inc
         */
        $inc = $this->capacity * $this->increment;

        /**
         * Увеличиваем диапазон в increment
         * раз
         */
        for ($i = ($this->capacity); $i < $inc; $i++) {
            $this->data[$i] = null;
        }

        /**
         * Устанавливаем новый capacity
         * @var \App\Ysiroteno\PhpDataStructures\Vector\Vector $capacity
         */
        $this->capacity = $inc;
    }
}


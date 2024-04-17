<?php
namespace App\Ysiroteno\PhpDataStructures\ArrayStructure;

class ArrayItem
{
    private $value = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}


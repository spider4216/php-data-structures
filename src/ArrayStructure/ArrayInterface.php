<?php
namespace App\Ysiroteno\PhpDataStructures\ArrayStructure;

interface ArrayInterface
{
    public function push(mixed $item): self;

    public function find($value): ?int;
}


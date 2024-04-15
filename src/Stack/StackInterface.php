<?php
namespace App\Ysiroteno\PhpDataStructures\Stack;

interface StackInterface
{
    public function push(string $value): self;

    public function pop(): string;

    public function getAsString(): string;
}


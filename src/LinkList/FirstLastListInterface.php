<?php
namespace App\Ysiroteno\PhpDataStructures\LinkList;

interface FirstLastListInterface extends LinkListInterface
{
    public function insertLast(int $key, string $value): self;
}


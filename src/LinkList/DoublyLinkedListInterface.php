<?php
namespace App\Ysiroteno\PhpDataStructures\LinkList;

interface DoublyLinkedListInterface extends FirstLastListInterface
{
    public function getAsStringBackward(): string;
}


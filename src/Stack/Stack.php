<?php
namespace App\Ysiroteno\PhpDataStructures\Stack;

use App\Ysiroteno\PhpDataStructures\LinkList\LinkListInterface;
use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;

class Stack implements StackInterface
{
    protected LinkListInterface $linkList;

    private int $count = 0;

    public function __construct()
    {
        $this->linkList = new LinkList();
    }

    public function push(string $value): self
    {
        $this->linkList->insertFirst($this->count, $value);
        $this->count++;

        return $this;
    }

    public function pop(): string
    {
        $item = $this->linkList->deleteFirst();
        $this->count--;

        return $item;
    }

    public function getAsString(): string
    {
        return $this->linkList->__toString();
    }
}


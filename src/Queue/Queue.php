<?php
namespace App\Ysiroteno\PhpDataStructures\Queue;

use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastList;
use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastListInterface;

class Queue implements QueueInterface
{
    protected FirstLastListInterface $linkList;

    private int $count = 0;

    public function __construct()
    {
        $this->linkList = new FirstLastList();
    }

    public function insert(string $value): self
    {
        $this->linkList->insertLast($this->count, $value);
        $this->count++;

        return $this;
    }

    public function remove(): string
    {
        $value = $this->linkList->deleteFirst();
        $this->count++;

        return $value;
    }

    public function getAsString(): string
    {
        return $this->linkList->__toString();
    }

}


<?php
namespace App\Ysiroteno\PhpDataStructures\Queue;

interface QueueInterface
{
    public function insert(string $value): self;

    public function remove(): string;

    public function getAsString(): string;
}


<?php
namespace App\Ysiroteno\PhpDataStructures\ArrayStructure;

interface ArrayInterface
{
    public function push(mixed $item): self;

    public function find($value): ?int;

    public function capacity(): int;

    public function filledCount(): int;

    public function bubbleSort(): void;

    public function selectSort(): void;

    public function insertSort(): void;

    public function linearSearch($value): ?string;
}

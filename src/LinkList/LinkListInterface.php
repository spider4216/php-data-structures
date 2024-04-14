<?php
namespace App\Ysiroteno\PhpDataStructures\LinkList;

interface LinkListInterface
{
    public function insertFirst(int $key, string $value): self;

    public function deleteFirst(): void;

    public function find(int $key): ?string;

    public function delete(int $key): void;

    public function __toString(): string;

    public function isEmpty(): bool;
}


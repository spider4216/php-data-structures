<?php
namespace App\Ysiroteno\PhpDataStructures\Tree;

interface BinaryTreeInterface
{
    public function find(int $key): ?string;

    public function insert(int $key, string $value): self;

    /**
     * Обход дерева через симметричный алгоритм
     *
     * @return string
     */
    public function inOrder(?Node $localRoot = null): void;
}


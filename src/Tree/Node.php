<?php
namespace App\Ysiroteno\PhpDataStructures\Tree;

class Node
{
    private ?int $key = null;

    private ?string $value = null;

    private ?Node $leftChild = null;

    private ?Node $rightChild = null;

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getLeftChild(): ?Node
    {
        return $this->leftChild;
    }

    public function getRightChild(): ?Node
    {
        return $this->rightChild;
    }

    public function setKey(?int $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setLeftChild(?Node $leftChild): self
    {
        $this->leftChild = $leftChild;

        return $this;
    }

    public function setRightChild(?Node $rightChild): self
    {
        $this->rightChild = $rightChild;

        return $this;
    }

}

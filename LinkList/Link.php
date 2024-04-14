<?php

class Link
{
    private ?int $key = null;

    private ?string $value = null;

    private ?Link $next = null;

    public function __construct(int $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setNext(?Link $link): self
    {
        $this->next = $link;

        return $this;
    }

    public function getNext(): ?Link
    {
        return $this->next;
    }
}

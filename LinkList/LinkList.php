<?php

require_once __DIR__ . '/Link.php';

class LinkList
{
    private ?Link $first = null;

    public function isEmpty(): bool
    {
        return $this->first === null;
    }

    public function insertFirst(int $key, string $value): self
    {
        $newLink = new Link($key, $value);
        $newLink->setNext($this->first);
        $this->first = $newLink;

        return $this;
    }

    /**
     * Предполагается, что список не пуст
     */
    public function deleteFirst(): void
    {
        $this->first = $this->first->getNext();
    }

    public function getAsString(): string
    {
        $result = '';

        $current = $this->first;

        while ($current !== null) {
            $result .= $current->getKey() . ':' . $current->getValue() . ';';
            $current = $current->getNext();
        }

        return $result;
    }

    public function __toString(): string
    {
        return $this->getAsString();
    }
}


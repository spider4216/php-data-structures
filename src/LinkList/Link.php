<?php

namespace App\Ysiroteno\PhpDataStructures\LinkList;

/**
 * Элемент связанного списка. Инкапсулированный вариант,
 * доступ к нему возможен только из общей структуры
 * связанного списка
 *
 * @author ysirotenko
 */
class Link
{
    protected ?int $key = null;

    protected ?string $value = null;

    protected ?Link $next = null;

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

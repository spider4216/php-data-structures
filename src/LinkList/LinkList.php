<?php

namespace App\Ysiroteno\PhpDataStructures\LinkList;

class LinkList implements LinkListInterface
{
    protected ?Link $first = null;

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
    public function deleteFirst(): string
    {
        $tmp = $this->first;
        $this->first = $this->first->getNext();
        return $tmp->getValue();
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

    public function find(int $key): ?string
    {
        $current = $this->first;

        while ($current->getKey() !== $key) {
            if ($current->getNext() === null) {
                return null;
            } else {
                $current = $current->getNext();
            }
        }

        return $current->getValue();
    }

    /**
     * Delete item by key
     *
     * @param int $key
     */
    public function delete(int $key): void
    {
        // Текущий элемент как первый
        $current = $this->first;
        // Предыдущий элемент как первый
        $previous = $this->first;

        // Продолжать поиск пока не удалось найти совпадение
        while ($current->getKey() !== $key) {
            // Если достигли последнего элемента
            if ($current->getNext() === null) {
                // Выходи
                return;
            } else {
                // Иначе делаем предыдущий как текущий
                $previous = $current;
                // а текущий как следующий
                $current = $current->getNext();
            }
        }

        /**
         * Если удалось найти совпадение и оно является
         * первым, то делаем первый как следующий
         */
        if ($current === $this->first) {
            $this->first = $this->first->getNext();
        } else {
            /**
             * Иначе нужно найденный элемент переписать
             * следующим
             */
            $previous->setNext($current->getNext());
        }
    }
}


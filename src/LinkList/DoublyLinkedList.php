<?php
namespace App\Ysiroteno\PhpDataStructures\LinkList;

class DoublyLinkedList extends FirstLastList implements DoublyLinkedListInterface
{
    public function getAsStringBackward(): string
    {
        $result = '';

        $current = $this->last;

        while ($current !== null) {
            $result .= $current->getKey() . ':' . $current->getValue() . ';';
            $current = $current->getPrevious();
        }

        return $result;
    }

    public function insertFirst(int $key, string $value): self
    {
        $newLink = new DoublyLink($key, $value);

        /**
         * Если связанный список является пустым
         * То последний элемент, как и первый
         * также должен ссылаться на создаваемый
         * айтем
         */
        if($this->isEmpty()) {
            $this->last = $newLink;
        } else {
            $this->first->setPrevious($newLink);
        }

        $newLink->setNext($this->first);
        $this->first = $newLink;

        return $this;
    }

    public function insertLast(int $key, string $value): self
    {
        $newLink = new DoublyLink($key, $value);

        /**
         * Если список пустой, то ссылку на
         * новый элемент вставляем как в начало
         * так и в конец (после else)
         */
        if ($this->isEmpty()) {
            $this->first = $newLink;
        } else {
            /**
             * Если список не пустой, то сначала у последнего
             * элемента следующий меняем ссылку на новый элемент,
             * а сам последний элемент меняем на новый
             */
            $this->last->setNext($newLink);
            $newLink->setPrevious($this->last);
        }

        $this->last = $newLink;

        return $this;
    }

    /**
     * Здесь предполагается, что список не пуст
     * отсутствует обработка на пустоту
     */
    public function deleteFirst(): string
    {
        if ($this->first->getNext() === null) {
            $this->last = null;
        } else {
            $this->first->getNext()->setPrevious(null);
        }

        $tmp = $this->first;
        $this->first = $this->first->getNext();

        return $tmp->getValue();
    }
}


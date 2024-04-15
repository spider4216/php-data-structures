<?php
namespace App\Ysiroteno\PhpDataStructures\LinkList;

class DoublyLink extends Link
{
    protected ?DoublyLink $previous = null;

    public function getPrevious(): ?DoublyLink
    {
        return $this->previous;
    }

    public function setPrevious(?DoublyLink $link): self
    {
        $this->previous = $link;

        return $this;
    }
}


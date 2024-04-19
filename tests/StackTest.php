<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\Stack\Stack;

class StackTest extends TestCase
{
    public function testPop(): void
    {
        $stack = (new Stack())
            ->push('Almaty')
            ->push('Astana')
            ->push('Aktobe')
            ->push('Atyrau');

        $this->assertEquals('Atyrau', $stack->pop());
        $this->assertEquals('Aktobe', $stack->pop());
        $this->assertEquals('Astana', $stack->pop());
        $this->assertEquals('Almaty', $stack->pop());
    }
}


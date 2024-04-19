<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\Queue\Queue;

class QueueTest extends TestCase
{
    public function testRemove(): void
    {
        $queue = (new Queue())
            ->insert('Almaty')
            ->insert('Astana')
            ->insert('Aktobe')
            ->insert('Atyrau');

        $this->assertEquals('Almaty', $queue->remove());
        $this->assertEquals('Astana', $queue->remove());
        $this->assertEquals('Aktobe', $queue->remove());
        $this->assertEquals('Atyrau', $queue->remove());
    }
}


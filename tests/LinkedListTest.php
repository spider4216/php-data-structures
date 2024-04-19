<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;

class LinkedListTest extends TestCase
{
    public function testInsertFirst(): void
    {
        $linkedList = new LinkList();
        $this->assertEquals(true, $linkedList->isEmpty());
        $linkedList->insertFirst(443, 'Almaty');
        $this->assertEquals(false, $linkedList->isEmpty());
    }

    public function testDeleteFirst(): void
    {
        $linkedList = (new LinkList())
            ->insertFirst(24, 'Abay')
            ->insertFirst(261, 'Aktau')
            ->insertFirst(263, 'Aktobe');

        $this->assertEquals('Aktobe', $linkedList->find(263));
        $linkedList->deleteFirst();
        $this->assertNull($linkedList->find(263));
    }

    public function testFindByKey(): void
    {
        $linkedList = (new LinkList())
            ->insertFirst(24, 'Abay')
            ->insertFirst(261, 'Aktau')
            ->insertFirst(263, 'Aktobe')
            ->insertFirst(443, 'Almaty')
            ->insertFirst(13698, 'Astana');

        $this->assertEquals('Almaty', $linkedList->find(443));
    }

    public function testFind()
    {
        $linkedList = (new LinkList())
            ->insertFirst(24, 'Abay')
            ->insertFirst(261, 'Aktau')
            ->insertFirst(263, 'Aktobe')
            ->insertFirst(443, 'Almaty')
            ->insertFirst(13698, 'Astana');

        $this->assertEquals('Almaty', $linkedList->find(443));
    }
}


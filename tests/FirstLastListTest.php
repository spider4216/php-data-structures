<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastList;

class FirstLastListTest extends TestCase
{
    public function testInsertFirstLast(): void
    {
        $firstLastList = (new FirstLastList())
            ->insertFirst(24, 'Abay')
            ->insertFirst(261, 'Aktau')
            ->insertLast(263, 'Aktobe')
            ->insertLast(443, 'Almaty')
            ->insertLast(13698, 'Astana');

        $this->assertEquals('Abay', $firstLastList->find(24));
        $this->assertEquals('Astana', $firstLastList->find(13698));
    }
}

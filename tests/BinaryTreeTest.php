<?php
namespace App\Ysiroteno\PhpDataStructures\Tests;

use PHPUnit\Framework\TestCase;
use App\Ysiroteno\PhpDataStructures\Tree\BinaryTree;

class BinaryTreeTest extends TestCase
{
    public function testFind(): void
    {
        $tree = (new BinaryTree())
            ->insert(24, 'Abay')
            ->insert(261, 'Aktau')
            ->insert(263, 'Aktobe')
            ->insert(443, 'Almaty')
            ->insert(13698, 'Astana');

        $this->assertEquals('Almaty', $tree->find(443));
    }
}


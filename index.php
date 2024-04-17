<?php

use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;
use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastList;
use App\Ysiroteno\PhpDataStructures\LinkList\DoublyLinkedList;
use App\Ysiroteno\PhpDataStructures\Stack\Stack;
use App\Ysiroteno\PhpDataStructures\Queue\Queue;
use App\Ysiroteno\PhpDataStructures\Tree\BinaryTree;
use App\Ysiroteno\PhpDataStructures\ArrayStructure\ArrayStructure;
use App\Ysiroteno\PhpDataStructures\Vector\Vector;

require_once __DIR__ . '/autoload_psr.php';

$linkList = (new LinkList())
    ->insertFirst(443, 'Almaty')
    ->insertFirst(13698, 'Astana')
    ->insertFirst(263, 'Aktobe')
    ->insertFirst(873, 'Atyrau');

echo $linkList->getAsString() . "\n\n";
echo "Try to find 263 city...\n";
echo $linkList->find(263) . "\n\n";
echo "Try to delete 13698 city\n";
$linkList->delete(13698);
echo $linkList->getAsString() . "\n\n";


$firstLastList = (new FirstLastList())
    ->insertFirst(263, 'Aktobe')
    ->insertFirst(873, 'Atyrau');

echo "First Last List \n\n";
echo $firstLastList->getAsString() . "\n\n";

echo "Insert in the end...\n";
$firstLastList->insertLast(13698, 'Astana');
echo $firstLastList->getAsString() . "\n\n";

echo "Insert in the biginning...\n";
$firstLastList->insertFirst(443, 'Almaty');
echo $firstLastList->getAsString() . "\n\n";

echo "Fill doubly list...\n\n";

$doublyList = (new DoublyLinkedList())
    ->insertFirst(443, 'Almaty')
    ->insertFirst(263, 'Aktobe')
    ->insertFirst(873, 'Atyrau');

echo "Echo backward...\n";
echo $doublyList->getAsStringBackward() . "\n\n";
echo "Echo forward...\n";
echo $doublyList->getAsString() . "\n\n";

echo "Insert last... \n\n";

$doublyList->insertLast(13698, 'Astana');

echo $doublyList->getAsString() . "\n\n";

echo "Delete fitst...\n";
$doublyList->deleteFirst();
echo $doublyList->getAsString() . "\n\n";

echo "Inserting in stack...\n";
$stack = (new Stack())
    ->push('Almaty')
    ->push('Astana')
    ->push('Aktobe')
    ->push('Atyrau');
echo $stack->getAsString() . "\n\n";

echo 'Pop: ' . $stack->pop() . "\n";
echo 'Pop: ' . $stack->pop() . "\n";
echo 'Pop: ' . $stack->pop() . "\n";
echo 'Pop: ' . $stack->pop() . "\n\n";

echo "Inserting in queue...\n";
$queue = (new Queue())
    ->insert('Almaty')
    ->insert('Astana')
    ->insert('Aktobe')
    ->insert('Atyrau');

echo $queue->getAsString() . "\n\n";

echo 'Remove: ' . $queue->remove() . "\n";
echo 'Remove: ' . $queue->remove() . "\n";

echo $queue->getAsString() . "\n\n";

echo "Init binary tree...\n\n";

$binaryTree = (new BinaryTree())
    ->insert(443, 'Almaty')
    ->insert(13698, 'Astana')
    ->insert(263, 'Aktobe')
    ->insert(873, 'Atyrau');

echo "Output tree: \n";

echo $binaryTree->inOrderCollect() . "\n\n";

echo "Find 443...\n";
echo $binaryTree->find(443) . "\n\n";

echo "Init array with 4 capacity...\n\n";

$array = (new ArrayStructure(4))
    ->push(263)
    ->push(443)
    ->push(873)
    ->push(13698);

echo "Try insert over capacity...\n\n";

try {
    $array->push(999);
} catch (\Exception $e) {
    echo 'catch with message: ' . $e->getMessage() . "\n\n";
}

echo "find index with value 263...\n";
echo 'Result: ' . $array->find(873) . "\n\n";

echo "Init vector with 4 capacity...\n\n";

$vector = (new Vector(4))
    ->push(263)
    ->push(443)
    ->push(873)
    ->push(13698);

echo "Try insert over capacity...\n\n";

$vector
    ->push(14698)
    ->push(15698)
    ->push(16698)
    ->push(17698);

echo "Push ok. vector extended automatically\n";

echo "find index with value 14698...\n";
echo 'Result: ' . $vector->find(16698) . "\n\n";
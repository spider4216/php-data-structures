<?php

use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;
use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastList;
use App\Ysiroteno\PhpDataStructures\LinkList\DoublyLinkedList;
use App\Ysiroteno\PhpDataStructures\Stack\Stack;

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

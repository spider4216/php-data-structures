<?php

use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;
use App\Ysiroteno\PhpDataStructures\LinkList\FirstLastList;

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
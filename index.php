<?php

use App\Ysiroteno\PhpDataStructures\LinkList\LinkList;

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
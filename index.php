<?php

require_once __DIR__ . '/LinkList/LinkList.php';

$linkList = (new LinkList())
    ->insertFirst(443, 'Almaty')
    ->insertFirst(13698, 'Astana')
    ->insertFirst(263, 'Aktobe')
    ->insertFirst(873, 'Atyrau');

echo $linkList->getAsString();
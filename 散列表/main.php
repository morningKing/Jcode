<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2017/5/22
 * Time: 17:04
 */
include "HashTable.php";

$ht = new \chapter6\HashTable();
$ht->insert('key1', 'value1');
$ht->insert('key12', 'value12');
echo $ht->find('key1');
echo $ht->find('key12');
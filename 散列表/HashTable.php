<?php
namespace chapter6;
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2017/5/22
 * Time: 16:18
 */
include "HashNode.php";

class HashTable
{
    private $buckets;
    private $size = 10;

    public function __construct()
    {
        //1.创建一个固定大小的数组存放数据
        $this->buckets = new \SplFixedArray($this->size);
    }

    //2.设计一个hash函数
    private function hashFunc($key)
    {
        $strlen = strlen($key);
        $hashval = 0;
        for ($i = 0; $i < $strlen; $i++) {
            $hashval += ord($key{$i});
        }
        return $hashval % $this->size;
    }

    public function insert($key, $value)
    {
        $index = $this->hashFunc($key);
        //拉链法避免hash冲突
        if (isset($this->buckets[$index])) {
            $newNode = new HashNode($key, $value, $this->buckets[$index]);
        } else {
            $newNode = new HashNode($key, $value, null);
        }
        $this->buckets[$index] = $newNode;
    }

    public function find($key)
    {
        $index = $this->hashFunc($key);
        $current = $this->buckets[$index];
        while (isset($current)) {
            if ($current->key == $key) {
                return $current->value;
            }
            $current = $current->nextNode;
        }
        return null;
    }
}
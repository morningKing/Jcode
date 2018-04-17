<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2017/5/22
 * Time: 16:33
 */

namespace chapter6;


class HashNode{
    public $key;
    public $value;
    public $nextNode;

    /**
     * HashNode constructor.
     * @param $key
     * @param $value
     * @param $nextNode
     */
    public function __construct($key, $value, $nextNode)
    {
        $this->key = $key;
        $this->value = $value;
        $this->nextNode = $nextNode;
    }

}
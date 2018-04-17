<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-25
 * Time: 21:22
 */
class Stack
{
    private $stack = [];

    public function push($obj){
        array_push($this->stack,$obj);
    }

    public function pop(){
        return array_pop($this->stack);
    }
}
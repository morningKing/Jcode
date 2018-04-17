<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-16
 * Time: 10:53
 */
class Node
{
    public $val;
    public $next;
    function __construct($val)
    {
        $this->val = $val;
    }
}
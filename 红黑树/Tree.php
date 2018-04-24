<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-24
 * Time: 14:46
 */
class Tree
{
    public function middle($tree)
    {
        $this->middle($tree->left);
        echo $tree->tag;
        $this->middle($tree->right);
    }
}
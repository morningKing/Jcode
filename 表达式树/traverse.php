<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-26
 * Time: 17:10
 */
function middleNode($node)
{
    if ($node != null) {
        middleNode($node->left);
        echo $node->tag . " ";
        middleNode($node->right);
    }
}

function leftNode($node)
{
    if (!empty($node)) {
        echo $node->tag . " ";
        leftNode($node->left);
        leftNode($node->right);
    }
}

function rightNode($node)
{
    if (!empty($node)) {
        rightNode($node->left);
        rightNode($node->right);
        echo $node->tag . " ";
    }
}
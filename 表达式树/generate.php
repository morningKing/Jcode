<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-25
 * Time: 21:20
 */

//ab+cde+**
require "Stack.php";
require "TreeNode.php";
require "traverse.php";

$input = str_split("ab+cde+**");
$stack = new Stack();
$len = count($input);
$index = 0;
while ($index < $len) {
    if (preg_match("/[a-z|0-9]/", $input[$index])) {
        $node = new TreeNode();
        $node->tag = $input[$index];
        $stack->push($node);
    }
    if (preg_match("/\*|\+/", $input[$index])) {
        $right = $stack->pop();
        $left = $stack->pop();
        $node = new TreeNode();
        $node->tag = $input[$index];
        $node->left = $left;
        $node->right = $right;
        $stack->push($node);
    }
    $index++;
}

$tree = $stack->pop();
middleNode($tree);
echo "\r\n";
leftNode($tree);
echo "\r\n";
rightNode($tree);
echo "\r\n";
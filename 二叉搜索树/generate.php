<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-29
 * Time: 17:53
 */
include "TreeNode.php";
include "traverse.php";
$var = [];
for ($i = 0; $i < 10; $i++) {
    while (true) {
        $temp = rand(1, 1000);
        if (in_array($temp, $var)) {
            continue;
        } else {
            array_push($var, $temp);
            break;
        }
    }
}
//$var = [1,2,3,4,5,6,8];
$tree = new TreeNode();
$tree->tag = 0;

foreach ($var as $value) {
    $tree = insert($value, $tree);
}

middleNode($tree);
echo "\r\n";
echo "max treenode is " . findMax($tree)->tag . "\r\n";
echo "min treenode is " . findMin($tree)->tag . "\r\n";

function insert($tag, $tree)
{
    if (empty($tree)) {
        $tree = new TreeNode();
        $tree->tag = $tag;
        $tree->left = $tree->right = null;
    } else if ($tag < $tree->tag) {
        $tree->left = insert($tag, $tree->left);
    } else if ($tag > $tree->tag) {
        $tree->right = insert($tag, $tree->right);
    }
    return $tree;
}

function find($tag, $tree)
{
    if (empty($tree)) {
        return null;
    } else if ($tag > $tree->tag) {
        return find($tag, $tree->right);
    } else if ($tag < $tree->tag) {
        return find($tag, $tree->left);
    } else {
        return $tree;
    }
}

function findMax($tree)
{
    if ($tree->right == null) {
        return $tree;
    }
    return findMax($tree->right);
}

function findMin($tree)
{
    if ($tree->left == null) {
        return $tree;
    }
    return findMax($tree->left);
}

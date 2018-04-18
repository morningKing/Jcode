<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-17
 * Time: 17:20
 */
require "traverse.php";
class AvlNode
{
    public $tag;
    public $left;
    public $right;
}

function create(){
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
    $tree = null;
    foreach ($var as $value) {
        $tree = insert($value, $tree);
    }
    return $tree;
}

function insert($tag, $avlTree)
{
    if ($avlTree == null) {
        $avlTree = new AvlNode();
        $avlTree->tag = $tag;
        $avlTree->left = $avlTree->right = null;
    } else if ($tag > $avlTree->tag) {
        $avlTree->right = insert($tag, $avlTree->right);
        if ((height($avlTree->right) - height($avlTree->left)) == 2) {
            if ($tag > $avlTree->right->tag)
                $avlTree = singleRotateWithRight($avlTree);
            else
                $avlTree = doubleRotateWithRight($avlTree);
        }
    } else {
        $avlTree->left = insert($tag, $avlTree->left);
        if ((height($avlTree->left) - height($avlTree->right)) == 2) {
            if ($tag < $avlTree->left->tag)
                $avlTree = singleRotateWithLeft($avlTree);
            else
                $avlTree = doubleRotateWithLeft($avlTree);
        }
    }
    return $avlTree;
}

function height($avlTree)
{
    if ($avlTree == null)
        return 0;
    $left = height($avlTree->left);
    $right = height($avlTree->right);
    return $left > $right ? ($left + 1) : ($right + 1);
}

//左单旋转
function singleRotateWithLeft($avlTree)
{
    $k1 = $avlTree;
    $k2 = $avlTree->left;
    $k1->left = $k2->right;
    $k2->right = $k1;
    return $k2;
}

//右单旋转
function singleRotateWithRight($avlTree)
{
    $k1 = $avlTree;
    $k2 = $k1->right;
    $k1->right = $k2->left;
    $k2->left = $k1;
    return $k2;
}

//左双旋转
function doubleRotateWithLeft($avlTree){
    $k3 = $avlTree;
    $k3->left = singleRotateWithRight($k3->left);
    return singleRotateWithLeft($k3);
}

//右双旋转
function doubleRotateWithRight($avlTree){
    $k3 = $avlTree;
    $k3->right = singleRotateWithLeft($k3->right);
    return singleRotateWithRight($k3);
}

function main(){
    $avlTree = create();
    middleNode($avlTree);
    var_dump($avlTree->tag);
    var_dump(height($avlTree));
}
main();
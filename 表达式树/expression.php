<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-24
 * Time: 21:49
 */

//(a+b*c)+((d*e+f)*g)
require "TreeNode.php";
require "traverse.php";

$node = new TreeNode();
$node->tag = '+';

$node1 = new TreeNode();
$node1->tag = '+';

$node2 = new TreeNode();
$node2->tag = '*';

$node3 = new TreeNode();
$node3->tag = 'a';

$node4 = new TreeNode();
$node4->tag = '*';

$node5 = new TreeNode();
$node5->tag = '+';

$node6 = new TreeNode();
$node6->tag = 'g';

$node7 = new TreeNode();
$node7->tag = 'b';

$node8 = new TreeNode();
$node8->tag = 'c';

$node9 = new TreeNode();
$node9->tag = '*';

$node10 = new TreeNode();
$node10->tag = 'f';

$node11 = new TreeNode();
$node11->tag = 'd';

$node12 = new TreeNode();
$node12->tag = 'e';


$node->left = $node1;
$node->right = $node2;

$node1->left = $node3;
$node1->right = $node4;

$node2->left = $node5;
$node2->right = $node6;

$node4->left = $node7;
$node4->right = $node8;

$node5->left = $node9;
$node5->right = $node10;

$node9->left = $node11;
$node9->right = $node12;

middleNode($node);
echo "\r\n";
leftNode($node);
echo "\r\n";
rightNode($node);
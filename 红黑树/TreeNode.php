<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-03-24
 * Time: 21:41
 */
require "Tree.php";

class TreeNode
{
    public $tag;
    public $left;
    public $right;
    public $color;
    public $parent;
}

class RBTree extends Tree
{
    public $root = null;

    const RED = 1;

    const BLACK = 2;

    public function insert($tag)
    {
        $t = $this->root;
        if ($t == null) {
            $tree = new TreeNode();
            $tree->tag = $tag;
            $tree->left = $tree->right = $tree->parent = null;
            $tree->color = self::BLACK;
            $this->root = $tree;
            return null;
        }
        $cmp = 0;
        do {
            $parent = $t;
            $cmp = $this->compare($tag, $t->tag);
            if ($cmp > 0)
                $t = $t->right;
            else
                $t = $t->left;
        } while ($t != null);
        $tree = new TreeNode();
        $tree->tag = $tag;
        $tree->parent = $parent;
        $tree->left = $tree->right = null;
        if ($cmp > 0)
            $parent->right = $tree;
        else
            $parent->left = $tree;
        $this->fixAfterInsertion($tree);
        return null;
    }

    private function compare($key1, $key2)
    {
        return $key1 > $key2 ? 1 : 0;
    }

    private function rotateRight($tree)
    {
        $parent = $this->parentOf($tree);
        $left = $this->leftOf($tree);
        $right = $this->rightOf($left);
        if ($parent != null){
            $left->parent = $parent;
            $parent->right = $left;
        }
        $left->right = $tree;
        $tree->left = $right;
        $tree->parent = $left;
    }

    private function rotateLeft($tree)
    {
        $parent = $this->parentOf($tree);
        $right = $this->rightOf($tree);
        $left = $this->leftOf($right);
        if ($parent != null){
            $right->parent = $parent;
            $parent->left = $right;
        }
        $right->left = $tree;
        $tree->right = $left;
        $tree->parent = $right;
    }

    private function leftOf($tree)
    {
        return $tree == null ? null : $tree->left;
    }

    private function rightOf($tree)
    {
        return $tree == null ? null : $tree->right;
    }

    private function parentOf($tree)
    {
        return $tree == null ? null : $tree->parent;
    }

    private function colorOf($tree)
    {
        return $tree == null ? null : $tree->color;
    }

    private function setColor($tree, $color)
    {
        return $tree && $tree->color = $color;
    }

    private function fixAfterInsertion($tree)
    {
        $tree->color = self::RED;
        while ($tree != null && $tree != $this->root
            && $this->colorOf($this->parentOf($tree)) == self::RED) {
            if ($this->parentOf($tree) == $this->leftOf($this->parentOf($this->parentOf($tree)))) {
                $right = $this->rightOf($this->parentOf($this->parentOf($tree)));
                if($this->colorOf($right) == self::RED){
                    //情况一，仅着色
                    $this->setColor($this->parentOf($tree),self::BLACK);
                    $this->setColor($this->parentOf($this->parentOf($tree)),self::RED);
                    $this->setColor($right,self::BLACK);
                    $tree = $this->parentOf($this->parentOf($tree));
                }else{
                    //情况二，作为右子树插入
                    if($tree == $this->rightOf($this->parentOf($tree))){
                        $tree = $this->parentOf($tree);
                        $this->rotateLeft($tree);
                    }
                    //情况三，跟左子树黑节点比右子树黑节点多
                    $this->setColor($this->parentOf($tree),self::BLACK);
                    $this->setColor($this->parentOf($this->parentOf($tree)),self::RED);
                    $this->rotateRight($this->parentOf($this->parentOf($tree)));
                }
            }else{
                $left = $this->leftOf($this->parentOf($this->parentOf($tree)));
                if($this->colorOf($left) == self::RED){
                    $this->setColor($this->parentOf($tree),self::BLACK);
                    $this->setColor($this->parentOf($this->parentOf($tree)),self::RED);
                    $this->setColor($left,self::BLACK);
                    $tree = $this->parentOf($this->parentOf($tree));
                }else{
                    if($tree == $this->leftOf($this->parentOf($tree))){
                        $tree = $this->parentOf($tree);
                        $this->rotateRight($tree);
                    }
                    $this->setColor($this->parentOf($tree),self::BLACK);
                    $this->setColor($this->parentOf($this->parentOf($tree)),self::RED);
                    $this->rotateLeft($this->parentOf($this->parentOf($tree)));
                }
            }
        }
        $this->root->color = self::BLACK;
    }

    public function unitTest(){
        //右旋转
        $n1 = new TreeNode();
        $n2 = new TreeNode();
        $n3 = new TreeNode();
//        $n1->tag = 1;
//        $n2->tag = 2;
//        $n3->tag = 3;
//        $n1->right = $n3;
//        $n3->parent = $n1;
//        $n3->left = $n2;
//        $n2->parent = $n3;
//        $this->rotateRight($n3);
//        var_dump($n1);

        //左旋转
//        $n3->left = $n1;
//        $n1->parent = $n3;
//        $n1->right = $n2;
//        $n2->parent = $n1;
//        $this->rotateLeft($n1);
//        var_dump($n3);

        $n1->tag = 10;
        $n2->tag = 85;
        $n3->tag = 15;
        $n1->right = $n3;
        $n3->parent = $n1;
        $n3->right = $n2;
        $n2->parent = $n3;
        $this->rotateLeft($n1);
        var_dump($n3);
        //插入
//        $this->insert(10);
//        $this->insert(85);
//        $this->insert(15);
    }
}
$rbTree = new RBTree();
$rbTree->unitTest();



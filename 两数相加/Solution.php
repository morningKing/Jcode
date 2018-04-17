<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-16
 * Time: 10:55
 */
require "Node.php";
function create($array)
{
    if (($len = count($array)) == 0)
        return false;
    $node = new Node($array[0]);
    $res = $node;
    for ($i = 1; $i < $len; $i++) {
        $next = new Node($array[$i]);
        $node = $node->next = $next;
    }
    return $res;
}

function length($node)
{
    $count = 0;
    while ($node) {
        $node = $node->next;
        $count++;
    }
    return $count;
}

//1211
//  56
function add($node1, $node2)
{
    $long = length($node1) > length($node2) ? $node1 : $node2;
    $short = length($node1) > length($node2) ? $node2 : $node1;
    $res = $long;
    while ($long) {
        if (($sum = $long->val + $short->val) >= 10) {
            $sum = $sum - 10;
            $point = $long->next;
            while (true) {
                if ($point == null) {
                    $point = new Node(1);
                    $long->next = $point;
                    break;
                }
                if (($point->val++) >= 10)
                    $point->val = 0;
                else
                    break;
                $point = $point->next;
            }
        }
        $long->val = $sum;
        $long = $long->next;
        $short = $short->next == null ?
            (new Node(0)) : $short->next;
    }
    return $res;
}

$node1 = create([9, 9, 9, 9]);
$node2 = create([1]);
$list = add($node1, $node2);

while ($list) {
    echo $list->val . " ";
    $list = $list->next;
}
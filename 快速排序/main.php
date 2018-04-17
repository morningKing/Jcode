<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2017/6/1
 * Time: 18:48
 */
include "Sort.php";
$sort = new Sort();
$arr = array(
    57, 68, 59, 52, 72, 28, 96, 33, 24
);

$right = count($arr)-1;
$left  = 0;

$sort->quickSort($arr,$left,$right);

var_dump($arr);
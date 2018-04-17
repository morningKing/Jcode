<?php

/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2017/6/1
 * Time: 18:30
 */
class Sort
{
    public function __construct()
    {
    }

    public function quickSort(&$arr, $left, $right)
    {
        if ($left >= $right)
            return 0;
        $middle = $left;
        $last = $right;
        $key = $arr[$middle];
        while ($middle < $last) {
            while ($middle < $last && $arr[$last] >= $key) {
                $last--;
            }
            $arr[$middle] = $arr[$last];
            while ($middle < $last && $arr[$middle] <= $key) {
                $middle++;
            }
            $arr[$last] = $arr[$middle];
        }
        $arr[$middle] = $key;
        $this->quickSort($arr, $left, $middle - 1);
        $this->quickSort($arr, $middle + 1, $right);
        return 0;
    }
}
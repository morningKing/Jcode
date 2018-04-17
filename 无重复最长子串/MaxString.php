<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-17
 * Time: 11:32
 */
//生产字符串
function create($len)
{
    $str = '';
    for ($i = 0; $i < $len; $i++) {
        $str .= chr(rand(97, 122));
    }
    return $str;
}

//最长子串
function max_string($str)
{
    $arr = str_split($str, 1);
    $len = count($arr);
    $tmp = 0;
    $tmp_arr = [];
    $max = 0;
    $max_arr = [];
    for ($i = 0; $i < $len; $i++) {
        for($j = $i; $j< $len; $j++){
            if (!in_array($arr[$j], $tmp_arr)) {
                $tmp_arr[$j] = $arr[$j];
                $tmp++;
            } else {
                if($tmp > $max){
                    $max = $tmp;
                    $max_arr = $tmp_arr;
                }
                $tmp = 0;
                $tmp_arr = [];
                break;
            }
        }
    }
    return $max_arr;
}
var_dump($str = create(10));
var_dump(max_string($str));
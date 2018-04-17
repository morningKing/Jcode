<?php
/**
 * Created by PhpStorm.
 * User: jinji
 * Date: 2018-04-10
 * Time: 20:04
 */
if ($argc < 3) {
    echo "Parameter Error";
    exit;
}
$count = $argc - 1;
$arg = [];
for ($i = 0; $i < $count; $i++) {
    $arg[$i] = $argv[$i + 1];
}
$a = [];
$b = [];
for ($i = $count, $c = 1; $i > 0; $i--, $c++) {
    for ($j = 0; $j < 2 * $i - 1; $j++) {
        if ($i == $count)
            array_push($b, $arg[$count - $i]);
        else {
            for ($k = $c - 1; $k < (2 * $count - $c); $k++) {
                $b[$k] = $arg[$count - $i];
            }
        }
    }

    array_push($a, $b);
}
foreach ($a as $d) {
    for ($e = 0; $e < (2 * $count - 1); $e++) {
        echo $d[$e] . " ";
    }
    echo "\r\n";
}
for ($i = ($count - 2); $i >= 0; $i--) {
    for ($e = 0; $e < (2 * $count - 1); $e++) {
        echo $a[$i][$e] . " ";
    }
    echo "\r\n";
}
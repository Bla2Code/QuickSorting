<?php
$arr = ['a','b','c','d','e','g','q','w','e','j'];
print_r(quicksort($arr));
function quicksort($arr) {
    $n = count($arr);
    switch ($n) {
        case 1:
        case 0:
            return $arr;
        case 2:
            if ($arr[0] > $arr[1])
                list($arr[0], $arr[1]) = array($arr[1], $arr[0]);
            return $arr;
        default:
            $less = $greater = array();
            $j = (int)floor(count($arr) / 2);
            $pivot = $arr[$j];
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i] < $pivot || $arr[$i] == $pivot && $i != $j) {
                    $less[] = $arr[$i];
                } elseif($arr[$i] > $pivot) {
                    $greater[] = $arr[$i];
                }
            }
            $less = quicksort($less);
            $less[] = $pivot;
            $greater = quicksort($greater);
            return array_merge($less, $greater);
    }
}
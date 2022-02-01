<?php

for ($i = 1; $i < 110; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo " CozaLoza ";
    } elseif ($i % 5 == 0 && $i % 7 == 0) {
        echo " CozaWoza ";
    } elseif ($i % 5 == 0) {
        echo " Loza ";
    } elseif ($i % 7 == 0) {
        echo " Woza ";
    } elseif ($i % 3 == 0) {
        echo " Coza ";
    } else {
        echo $i . ' ';
    }
    if ($i % 11 == 0) {
        echo PHP_EOL;
    }
}
echo PHP_EOL;

//$arr = range(1, 110);
//$str = "";
//for ($i = 0; $i < count($arr); $i++) {
//    if (($arr[$i] % 3) == 0) {
//        $str .= " Coza ";
//    } elseif (($arr[$i] % 5) == 0) {
//        $str .= " Loza ";
//    } elseif (($arr[$i] % 7) == 0) {
//        $str .= " Woza ";
//    } elseif (($arr[$i] % 3 == 0) && ($arr[$i] % 5 == 0)) {
//        $str .= " CozaLoza ";
//    } elseif ((($arr[$i] % 5) == 0) && (($arr[$i] % 7) == 0)) {
//        $str .= " CozaWoza ";
//    } else {
//        $str .= " $arr[$i]";
//    }
//    if ($i == 10 || $i == 21 || $i == 32 || $i == 43 || $i == 54 ||
//        $i == 65 || $i == 76 || $i == 87 || $i == 98) {
////    if (($i % 11 == 0) && $i != 0) {
//        $str .= PHP_EOL;
//    }
//}
//echo $str . PHP_EOL;
////print_r($arr);
<?php

$str = "12345+67890";
//$str = "324-111";
//$str = "325*4405";
//$str = "1234*4";

preg_match('/[-+*]/', $str, $sign);

[$x, $y] = explode($sign[0], $str);
$total = eval('return '.$x.$sign[0].$y.';');

$dashes = ($sign[0] != '*') ? str_repeat("-", (strlen($y) + 1)): str_repeat("-", strlen($total)) ;

$gap = null;
$output = '';

if ($sign[0] != '*') {

    $gap = str_repeat(" ", ((strlen($y) + 1) - strlen($x)));
    $output .= $gap . $x . "\n" . $sign[0] . $y . "\n" . $dashes . "\n" . $gap . $total . "\n";

} else {

    $gapX = str_repeat(" ", (strlen($total) - strlen($x)));
    $gapY = str_repeat(" ", (strlen($total) - (strlen($y) + 1)));
    $dashes1 = str_repeat("-", (strlen($y) + 1));
    $body = '';
    $reverse = strrev($y);

    $spaceX = strlen($total) - strlen($y);
    $spaceY = strlen($total) - (strlen($y)+1);

    $gapBodyX = str_repeat(" ", $spaceX);
    $gapBodyY = str_repeat(" ", $spaceY);

    for ($i = 0; $i < strlen($y); $i++) {

        $body .=  $gapBodyX . eval('return '.$reverse[$i].'*'.$x.';') . "\n" . $gapBodyY;

    }

    if (strlen($y) == 1) {

        $output .= $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n"
            . $gapY . "\n" . $dashes . "\n" . $gap . $total . "\n";

    } else {

        $output .= $gapX . $x . "\n" . $gapY . $sign[0] . $y . "\n"
            . $gapY . $dashes1 . "\n" . $body . "\n"
            . $dashes . "\n" . $gap . $total . "\n";

    }

}

echo "$output";

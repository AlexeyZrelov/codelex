<?php
/**
You're code is evaluating this equation:
x(t) = 0.5 * (at)2 + v(t) + x

when it should be evaluating:
x(t) = 0.5 * a(t2) + v(t) + x
The normal understanding of math notation is that exponentiation binds
 tighter than multiplication.
 */
$a = -9.81;
$t = 10;
$v = 0;
$x = 0;

$x = 0.5 * $a * ($t**2) + $v * $t + $x;

echo "$x m" . PHP_EOL;

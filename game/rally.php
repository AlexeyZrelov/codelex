<?php

$length = 15;

//$members = ['A', 'B', 'C', 'D'];
$members = range('A', 'D');

$tracks = [];

for ($i = 0; $i < count($members); $i++) {
    for ($j = 0; $j < $length; $j++) {
        $tracks[$i][$j] = ' -';
    }
}

function showTrack(array $arr, array $arr1): void
{
    foreach ($arr as $i => $v) {
        echo "[" . $arr1[$i] . "]";
        foreach ($v as $j) {
            echo " $j";
        }
        echo " ◆" . PHP_EOL;
    }
}

$c = readline('Car A[1], B[2], C[3], D[4]: ');
$car = '';
switch ($c) {
    case 1:
        $car = $members[0];
        break;
    case 2:
        $car = $members[1];
        break;
    case 3:
        $car = $members[2];
        break;
    case 4:
        $car = $members[3];
        break;
}

$start = readline('Start[Enter], Exit[n]: ');
$credit = 10;
$pay = 10;

while (true) {

    if ($start === '') {

        showTrack($tracks, $members);
        echo "Credit($credit), pay($pay), Car($car)" . PHP_EOL;

        sleep(1);

        foreach ($tracks as $i => $v) {

            $j = array_search($members[$i], $v);
            $next = $j + rand(1,3);

            $tracks[$i][$next] = $members[$i];
            $tracks[$i][$j] = ' -';

            $last = array_key_last($v);

            if ($next >= $last) {

                $credit = $members[$i] == $car ? $credit + $pay: $credit - $pay;

                echo PHP_EOL;
                showTrack($tracks, $members);
                echo "Credit($credit), pay($pay), Car($car)" . PHP_EOL;
                echo $members[$i] == $car ?
                    " Win car $members[$i] F-i-n-e !" . PHP_EOL:
                    " Win car $members[$i] U-p-s-s !" . PHP_EOL;
                exit;
            }
        }
        echo PHP_EOL;

    } else if ($start === 'n') {
        exit;
    }

}

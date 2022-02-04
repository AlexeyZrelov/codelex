<?php

$cards = [];
$symbols = ['♣', '♦', '♥', '♠'];
$value = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
$color = ['red', 'black'];

$play1 = [];
$play2 = [];
$rand = [];

foreach ($symbols as $i) {
    foreach ($value as $j) {

        $c = $i == '♦' || $i == '♥' ? $color[0]: $color[1];

        $cards[] = [
            'value' => $j,
            'symbol' => $i,
            'color' => $c
        ];
    }
}

$size = ceil(count($cards) / 2);
$play1 = array_slice($cards, 0, $size);
$play2 = array_slice($cards, $size);
$play1[] = [
    'value' => 'JOK',
    'symbol' => '♠',
    'color' => 'black'
];

$key = array_rand($play1, 1);
$rand = $play1[$key];

//var_dump($rand);die;

$tmp = [];

foreach ($play1 as $i => $v) {
        if ($v['value'] == $rand['value']) {
//            && $v['color'] == $rand['color']) {
            $tmp[] = $v;
        }
}

foreach ($rand as $v) {
    echo "$v";
}
echo "\n";
//die;
echo "Play1: ";
foreach ($play1 as $v) {
    echo $v['value'] . $v['symbol'] . $v['color'] . ' ';
}
echo "\n";

echo "-----------------------------------------\n";
echo "tmp: ";
foreach ($tmp as $v) {
    echo $v['value'] . $v['symbol'] . $v['color'] . ' ';
}
echo "\n";


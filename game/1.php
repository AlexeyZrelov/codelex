<?php
$lists = explode(",", file_get_contents("1.txt"));

$key = array_rand($lists, 1);
$word = $lists[$key];

/* rock,paper,scissors,lizard,spock
1. rock < paper
2. paper < scissors
3. scissors < rock
4. paper < lizard
5. lizard < spock
*/
$comb = [
    [$lists[0], $lists[1]],
    [$lists[1], $lists[2]],
    [$lists[2], $lists[0]],
    [$lists[1], $lists[3]],
    [$lists[3], $lists[4]]
];

//$player = readline("Enter (0-rock, 1-paper, 2-scissors, 3-lizard, 4-spock): ");

//var_dump($word);die;
//var_dump($comb);die;
//var_dump($key);
//print_r($lists);

while (true) {
    echo "Dators = $word" . PHP_EOL;
    echo "-----------------" . PHP_EOL;

    $player = readline("Enter (0-rock, 1-paper, 2-scissors, 3-lizard, 4-spock): ");

//    var_dump($player);die;

    if ($lists[$player] === $lists[$key]) {
        echo "$lists[$player] === $lists[$key]" . PHP_EOL;
        echo "The game was tied!" . PHP_EOL;
        exit;
    }

    if ($lists[$player] === 'rock' && $lists[$key] === 'paper') {
        echo "$lists[$player] === $lists[$key]" . PHP_EOL;
        echo "Paper winn !" . PHP_EOL;
        exit;
    }

    if ($lists[$player] === 'paper' && $lists[$key] === 'scissors') {
        echo "$lists[$player] === $lists[$key]" . PHP_EOL;
        echo "Scissors winn !" . PHP_EOL;
        exit;
    }

    if ($lists[$player] === 'scissors' && $lists[$key] === 'rock') {
        echo "$lists[$player] === $lists[$key]" . PHP_EOL;
        echo "Rock winn !" . PHP_EOL;
        exit;
    }

    if ($lists[$player] === 'lizard' && $lists[$key] === 'paper') {
        echo "$lists[$player] === $lists[$key]" . PHP_EOL;
        echo "Rock winn !" . PHP_EOL;
        exit;
    }

}
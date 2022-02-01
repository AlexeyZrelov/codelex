<?php
/*
Он должен случайным образом выбрать слово из списка слов.
Он должен остановиться, когда угаданы все буквы.
Он должен давать им ограниченные попытки и останавливаться после того, как они закончатся.
Он должен отображать буквы, которые они уже отгадали (либо только неправильные догадки, либо все догадки).
 */

$list = ['leviathan', 'elephant', 'airplane', 'Trinity', 'Morpheus'];
$key = array_rand($list);
$word = str_split($list[$key]);

$letters = array_fill(0, count($word), ' _');

$misses = [];

while (true) {

    echo "     ";
    foreach ($word as $val) {
        echo " $val";
    }
    echo PHP_EOL;

    echo "-=-=-=-=-==-=-=-=-=-=-=-=-" . PHP_EOL;
    echo "Word:";
    foreach ($letters as $val) {
        echo " $val";
    }
    echo PHP_EOL;
    echo "Misses: ";
    foreach ($misses as $v) {
        echo " $v";
    }
    echo PHP_EOL;
    // Users input
    if (!array_diff($word, $letters)) {
        echo "YOU GOT IT!" . PHP_EOL;
        $quit = readline('Play "again" or "quit"? quit ');
        if (isset($quit)) {
            exit;
        }
    } else {
        $guess = readline("Guess: ");
    }
    echo PHP_EOL;

    if (in_array($guess, $word)) {
        foreach (array_keys($word, $guess) as $i) {
            $letters[$i] = $guess;
        }
    } else {
        $misses[] = $guess;
    }

}


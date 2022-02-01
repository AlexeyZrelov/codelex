<?php
$randNumber = rand(1, 100);
echo $randNumber . PHP_EOL;
$num = readline("I'm thinking of a number between 1-100.  Try to guess it: ");

if ($randNumber < $num) {
    echo "Sorry, you are too high.  I was thinking of $randNumber." . PHP_EOL;
} elseif ($randNumber > $num) {
    echo "Sorry, you are too low.  I was thinking of $randNumber." . PHP_EOL;
} elseif ($randNumber == $num) {
    echo "You guessed it!  What are the odds?!?" . PHP_EOL;
} else {
    echo "Then quit";
}

//switch ($num) {
//    case $randNumber == $num:
//        echo "You guessed it!  What are the odds?!?" . PHP_EOL;
//        break;
//    case $randNumber > $num:
//        echo "Sorry, you are too low.  I was thinking of $randNumber." . PHP_EOL;
//        break;
//    case $randNumber < $num:
//        echo "Sorry, you are too high.  I was thinking of $randNumber." . PHP_EOL;
//        break;
//    default:
//        echo " ";
//}
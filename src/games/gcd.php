<?php

namespace Brain\Games\Gcd;

use Brain\Game\GameFlow;

function run()
{
    GameFlow\runGame(
        'Find the greatest common divisor of given numbers.',
        fn() => generateRound()
    );
}

function generateRound()
{
    $minNumber = 1;
    $maxNumber = 100;

    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $solution = findGcd($number1, $number2);

    $question = "{$number1} {$number2}";

    return [$question, $solution];
}

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

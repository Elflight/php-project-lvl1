<?php

namespace Brain\Games\Gcd;

function run()
{
    \Brain\Game\GameFlow\runGame(
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
    $result = findGcd($number1, $number2);

    return ["solution" => $result, "question" => "{$number1} {$number2}"];
}

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

<?php

namespace Brain\Even\Games\Gcd;

use function Brain\Games\gameCli\getAnswer;

function gameRound()
{
    $minNumber = 1;
    $maxNumber = 100;

    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $result = findGcd($number1, $number2);

    $answer = getAnswer("Question: {$number1} {$number2}");

    return ["solution" => $result, "answer" => $answer];
}

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

<?php

namespace Brain\Games\Prime;

use function Brain\Game\GameInterface\getAnswer;

function getRules()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function gameRound()
{
    $minNumber = 2;
    $maxNumber = 1000;
    $number = rand($minNumber, $maxNumber);

    $result = isPrime($number) ? 'yes' : 'no';

    $answer = getAnswer("Question: {$number}");

    return ["solution" => $result, "answer" => $answer];
}

function isPrime($number)
{
    if ($number == 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

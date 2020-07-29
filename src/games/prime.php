<?php

namespace Brain\Games\Prime;

function run()
{
    \Brain\Game\GameFlow\runGame(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        fn() => generateRound()
    );
}

function generateRound()
{
    $minNumber = 2;
    $maxNumber = 1000;
    $number = rand($minNumber, $maxNumber);

    $solution = isPrime($number) ? 'yes' : 'no';

    $question = $number;

    return [$question, $solution];
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

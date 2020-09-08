<?php

namespace Brain\Games\Gcd;

use Brain\Game\GameFlow;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $generateRound = function () {
        $minNumber = 1;
        $maxNumber = 100;

        $number1 = rand($minNumber, $maxNumber);
        $number2 = rand($minNumber, $maxNumber);
        $solution = findGcd($number1, $number2);

        $question = "{$number1} {$number2}";

        return [$question, $solution];
    };

    GameFlow\runGame(
        DESCRIPTION,
        $generateRound
    );
}

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

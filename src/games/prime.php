<?php

namespace Brain\Games\Prime;

use Brain\Game\GameFlow;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $generateRound = function () {
        $minNumber = 2;
        $maxNumber = 1000;
        $question = rand($minNumber, $maxNumber);

        $solution = isPrime($question) ? 'yes' : 'no';

        return [$question, $solution];
    };

    GameFlow\runGame(
        DESCRIPTION,
        $generateRound
    );
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

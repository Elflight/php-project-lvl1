<?php

namespace Brain\Games\Even;

use Brain\Game\GameFlow;

function run()
{
    GameFlow\runGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        fn() => generateRound()
    );
}

function generateRound()
{
    $minNumber = 1;
    $maxNumber = 100;

    $number = rand($minNumber, $maxNumber);
    $solution = $number % 2 === 0 ? 'yes' : 'no';

    $question = $number;

    return [$question, $solution];
}

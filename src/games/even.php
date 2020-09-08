<?php

namespace Brain\Games\Even;

use Brain\Game\GameFlow;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $generateRound = function () {
        $minNumber = 1;
        $maxNumber = 100;

        $question = rand($minNumber, $maxNumber);
        $solution = $question % 2 === 0 ? 'yes' : 'no';

        return [$question, $solution];
    };

    GameFlow\runGame(
        DESCRIPTION,
        $generateRound
    );
}

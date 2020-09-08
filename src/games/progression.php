<?php

namespace Brain\Games\Progression;

use Brain\Game\GameFlow;

const DESCRIPTION = 'What number is missing in the progression?';

function run()
{
    $generateRound = function () {
        $progressionLength = 10;

        $minStartNumber = 1;
        $maxStartNumber = 20;
        $startNumber = rand($minStartNumber, $maxStartNumber);

        $minStepNumber = 2;
        $maxStepNumber = 10;
        $step = rand($minStepNumber, $maxStepNumber);

        $hiddenItemIndexMin = 0;
        $hiddenItemIndexMax = $progressionLength - 1;
        $hiddenItemIndex = rand($hiddenItemIndexMin, $hiddenItemIndexMax);

        $arProgression = generateProgression($startNumber, $step, $progressionLength);

        $solution = $arProgression[$hiddenItemIndex];
        $arProgression[$hiddenItemIndex] = '..';

        $question = implode(' ', $arProgression);

        return [$question, $solution];
    };

    GameFlow\runGame(
        DESCRIPTION,
        $generateRound
    );
}



function generateProgression($startNumber, $step, $progressionLength)
{
    for ($i = 0; $i < $progressionLength; $i++) {
        $arProgression[] = $startNumber + $i * $step;
    }

    return $arProgression;
}

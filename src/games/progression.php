<?php

namespace Brain\Games\Progression;

function run()
{
    \Brain\Game\GameFlow\runGame(
        'What number is missing in the progression?',
        fn() => generateRound()
    );
}

function generateRound()
{
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

    $hiddenItem = $arProgression[$hiddenItemIndex];
    $arProgression[$hiddenItemIndex] = '..';

    return ["solution" => $hiddenItem, "question" => implode(' ', $arProgression)];
}

function generateProgression($startNumber, $step, $progressionLength)
{
    for ($i = 1; $i < $progressionLength + 1; $i++) {
        $arProgression[] = $startNumber + ($i - 1) * $step;
    }

    return $arProgression;
}

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
    for ($i = 0; $i < $progressionLength; $i++) {
        $arProgression[] = $startNumber + $i * $step;
    }

    return $arProgression;
}

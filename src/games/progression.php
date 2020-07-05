<?php

namespace Brain\Games\Progression;

use function Brain\Games\gameCli\getAnswer;

function getRules()
{
    return 'What number is missing in the progression?';
}


function gameRound()
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

    $strProgression = implode(' ', $arProgression);

    $answer = getAnswer("Question: {$strProgression}");

    return ["solution" => $hiddenItem, "answer" => $answer];
}

function generateProgression($startNumber, $step, $progressionLength)
{
    $progressionItem = $startNumber;
    for ($i = 0; $i < $progressionLength; $i++) {
        $arProgression[] = $progressionItem;
        $progressionItem = $progressionItem + $step;
    }

    return $arProgression;
}

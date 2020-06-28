<?php

namespace Brain\Even\Games\Progression;

use function cli\line;
use function cli\prompt;

function progressionGameRound()
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

    line("Question: {$strProgression}");
    $answer = prompt('Your answer');

    $arResult['solution'] = $hiddenItem;
    $arResult['answer'] = $answer;
    
    if ($answer != $hiddenItem) {
        $arResult['correct'] = false;
    } else {
        $arResult['correct'] = true;
    }

    return $arResult;
}

function generateProgression($startNumber, $step, $progressionLength)
{
    $arProgression = [$startNumber];
    $lastItem = $startNumber;
    for ($i = 0; $i < $progressionLength - 1; $i++) {
        $lastItem = $lastItem + $step;
        $arProgression[] = $lastItem;
    }

    return $arProgression;
}

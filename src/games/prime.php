<?php

namespace Brain\Even\Games\Prime;

use function cli\line;
use function cli\prompt;

function gameRound()
{
    $minNumber = 2;
    $maxNumber = 1000;
    $number = rand($minNumber, $maxNumber);

    $result = isPrime($number) ? 'yes' : 'no';

    line("Question: {$number}");
    $answer = prompt('Your answer');

    $arResult['solution'] = $result;
    $arResult['answer'] = $answer;
    
    if ($answer != $result) {
        $arResult['correct'] = false;
    } else {
        $arResult['correct'] = true;
    }

    return $arResult;
}

function isPrime($number)
{
    if ($number == 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

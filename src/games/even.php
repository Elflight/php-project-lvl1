<?php

namespace Brain\Even\Games\Even;

use function cli\line;
use function cli\prompt;

function evenGameRound()
{
    $min_number = 1;
    $max_number = 100;

    $number = rand($min_number, $max_number);
    $result = $number % 2 === 0 ? 'yes' : 'no';

    
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

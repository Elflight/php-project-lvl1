<?php

namespace Brain\Even\Games\Calculator;

use function cli\line;
use function cli\prompt;

function calculatorGameRound()
{
    $min_number = 1;
    $max_number = 100;
    $arActions = array('+', '-', '*');

    $number1 = rand($min_number, $max_number);
    $number2 = rand($min_number, $max_number);
    $action = $arActions[array_rand($arActions)];

    $result = eval("return {$number1} {$action} {$number2};");
    
    line("Question: {$number1} {$action} {$number2}");
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

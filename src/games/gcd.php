<?php

namespace Brain\Even\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcdGameRound()
{
    $min_number = 1;
    $max_number = 100;

    $number1 = rand($min_number, $max_number);
    $number2 = rand($min_number, $max_number);
    $result = findGcd($number1, $number2);

    
    line("Question: {$number1} {$number2}");
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

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

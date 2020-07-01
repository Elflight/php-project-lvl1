<?php

namespace Brain\Even\Games\Calculator;

use function Brain\Games\gameCli\getAnswer;

function gameRound()
{
    $minNumber = 1;
    $maxNumber = 100;
    $arActions = ['+', '-', '*'];

    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $action = $arActions[array_rand($arActions)];

    $result = eval("return {$number1} {$action} {$number2};");
    
    $answer = getAnswer("Question: {$number1} {$action} {$number2}");

    return ["solution" => $result, "answer" => $answer];
}

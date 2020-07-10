<?php

namespace Brain\Games\Calculator;

use function Brain\Game\GameInterface\getAnswer;

function getRules()
{
    return 'What is the result of the expression?';
}

function gameRound()
{
    $minNumber = 1;
    $maxNumber = 100;
    $arActions = ['+', '-', '*'];

    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $action = $arActions[array_rand($arActions)];

    //вариант c eval забракован, хотя в данном контексте eval абсолютно безопасен,
    //поскольку я полностью контролирую передаваемые параметры
    // $result = eval("return {$number1} {$action} {$number2};");

    switch ($action) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
    }
    
    $answer = getAnswer("Question: {$number1} {$action} {$number2}");

    return ["solution" => $result, "answer" => $answer];
}

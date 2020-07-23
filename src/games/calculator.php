<?php

namespace Brain\Games\Calculator;

function run()
{
    \Brain\Game\GameFlow\runGame(
        'What is the result of the expression?',
        fn() => generateRound()
    );
}

function generateRound()
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
    
    return ["solution" => $result, "question" => "{$number1} {$action} {$number2}"];
}

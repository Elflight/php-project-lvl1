<?php

namespace Brain\Games\Calculator;

use Brain\Game\GameFlow;

const DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $generateRound = function () {
        $minNumber = 1;
        $maxNumber = 100;
        $arActions = ['+', '-', '*'];

        $number1 = rand($minNumber, $maxNumber);
        $number2 = rand($minNumber, $maxNumber);
        $action = $arActions[array_rand($arActions)];

        //вариант c eval забракован, хотя в данном контексте eval абсолютно безопасен,
        //поскольку я полностью контролирую передаваемые параметры
        // $solution = eval("return {$number1} {$action} {$number2};");

        switch ($action) {
            case '+':
                $solution = $number1 + $number2;
                break;
            case '-':
                $solution = $number1 - $number2;
                break;
            case '*':
                $solution = $number1 * $number2;
                break;
        }

        $question = "{$number1} {$action} {$number2}";
        
        return [$question, $solution];
    };

    GameFlow\runGame(
        DESCRIPTION,
        $generateRound
    );
}

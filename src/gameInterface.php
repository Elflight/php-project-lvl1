<?php

namespace Brain\Game\GameInterface;

use Brain\Even\Games\Calculator;
use Brain\Even\Games\Even;
use Brain\Even\Games\Gcd;

use function Brain\Games\MyCli\{showHello, getName, showFinish, showSuccess, showError};

function run($gameName)
{
    $arHellos = [
        'Even' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'Calculator' => 'What is the result of the expression?',
        'Gcd' => 'Find the greatest common divisor of given numbers.'
    ];

    showHello($arHellos[$gameName]);
    $name = getName();

    $noErrors = true;
    for ($i = 1; $i <= 3; $i++) {
        //вот с этой частью у меня вопросы, пока сделал костыльно'
        if ($gameName == 'Calculator') {
            $arGameRoundResult = Calculator\calculatorGameRound();
        } elseif ($gameName == 'Even') {
            $arGameRoundResult = Even\evenGameRound();
            // $arGameRoundResult = call_user_func($gameName.'\GameRound');
        } elseif ($gameName == 'Gcd') {
            $arGameRoundResult = Gcd\gcdGameRound();
        }

        if (!$arGameRoundResult['correct']) {
            showError($arGameRoundResult['answer'], $arGameRoundResult['solution'], $name);
            $noErrors = false;
            break;
        } else {
            showSuccess();
        }
    }

    if ($noErrors) {
        showFinish($name);
    }
}

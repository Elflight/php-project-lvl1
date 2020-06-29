<?php

namespace Brain\Game\GameInterface;

use Brain\Even\Games\Calculator;
use Brain\Even\Games\Even;
use Brain\Even\Games\Gcd;
use Brain\Even\Games\Progression;
use Brain\Even\Games\Prime;

use function Brain\Games\MyCli\{showHello, getName, showFinish, showSuccess, showError};

function run($gameName)
{
    $arRules = [
        'Even' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'Calculator' => 'What is the result of the expression?',
        'Gcd' => 'Find the greatest common divisor of given numbers.',
        'Progression' => 'What number is missing in the progression?',
        'Prime' => 'Answer "yes" if given number is prime. Otherwise answer "no".'
    ];

    showHello($arRules[$gameName]);
    $name = getName();

    $noErrors = true;
    for ($i = 1; $i <= 3; $i++) {
        //вот с этой частью у меня вопросы, пока сделал костыльно'
        // $arGameRoundResult = call_user_func($gameName.'\GameRound');
        if ($gameName == 'Calculator') {
            $arGameRoundResult = Calculator\gameRound();
        } elseif ($gameName == 'Even') {
            $arGameRoundResult = Even\gameRound();
        } elseif ($gameName == 'Gcd') {
            $arGameRoundResult = Gcd\gameRound();
        } elseif ($gameName == 'Progression') {
            $arGameRoundResult = Progression\gameRound();
        } elseif ($gameName == 'Prime') {
            $arGameRoundResult = Prime\gameRound();
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

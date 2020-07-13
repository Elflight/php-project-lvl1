<?php

namespace Brain\Game\GameInterface;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run($gameName)
{
    $rules = call_user_func('Brain\Games\\' . $gameName . '\getRules');
    line('Welcome to the Brain Games!');
    line($rules);
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    $noErrors = true;
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $arGameRound = call_user_func('Brain\Games\\' . $gameName . '\gameRound');

        if ($arGameRound['answer'] != $arGameRound['solution']) {
            line("'{$arGameRound['answer']}' is wrong answer ;(. Correct answer was '{$arGameRound['solution']}'.");
            line("Let's try again, {$userName}!");
            $noErrors = false;
            break;
        } else {
            line("Correct!");
        }
    }

    if ($noErrors) {
        line("Congratulations, {$userName}!");
    }
}

function getAnswer($question)
{
    line($question);
    $answer = prompt('Your answer');

    return $answer;
}

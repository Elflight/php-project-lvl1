<?php

namespace Brain\Game\GameFlow;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame($rules, $generateRound)
{
    line('Welcome to the Brain Games!');
    line($rules);
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    $correctAnswersCount = 0;
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $arGameRound = $generateRound();

        [$question, $solution] = $arGameRound;

        line("Question: " . $question);
        $answer = prompt('Your answer');

        if ($answer != $solution) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$solution}'.");
            line("Let's try again, {$userName}!");
            break;
        } else {
            line("Correct!");
            $correctAnswersCount++;
        }
    }

    if ($correctAnswersCount === ROUNDS_COUNT) {
        line("Congratulations, {$userName}!");
    }
}

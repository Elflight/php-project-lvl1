<?php

namespace Brain\Game\GameFlow;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame($description, $generateRound)
{
    line('Welcome to the Brain Games!');
    line($description);
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    $correctAnswersCount = 0;
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $solution] = $generateRound();

        line("Question: " . $question);
        $answer = prompt('Your answer');

        if ($answer != $solution) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$solution}'.");
            line("Let's try again, {$userName}!");
            return;
        } else {
            line("Correct!");
            $correctAnswersCount++;
        }
    }
    line("Congratulations, {$userName}!");
}

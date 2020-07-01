<?php

namespace Brain\Even\Games\Even;

use function Brain\Games\gameCli\getAnswer;

function gameRound()
{
    $minNumber = 1;
    $maxNumber = 100;

    $number = rand($minNumber, $maxNumber);
    $result = $number % 2 === 0 ? 'yes' : 'no';

    $answer = getAnswer("Question: {$number}");

    return ["solution" => $result, "answer" => $answer];
}

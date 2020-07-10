<?php

namespace Brain\Games\Even;

use function Brain\Game\GameInterface\getAnswer;

function getRules()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function gameRound()
{
    $minNumber = 1;
    $maxNumber = 100;

    $number = rand($minNumber, $maxNumber);
    $result = $number % 2 === 0 ? 'yes' : 'no';

    $answer = getAnswer("Question: {$number}");

    return ["solution" => $result, "answer" => $answer];
}

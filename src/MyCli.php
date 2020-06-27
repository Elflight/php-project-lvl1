<?php

namespace Brain\Games\MyCli;

use function cli\line;
use function cli\prompt;

function showHello($strRules)
{
    line('Welcome to the Brain Games!');
    line($strRules);
    line();
}

function showFinish($name)
{
    line("Congratulations, {$name}!");
}

function showSuccess()
{
    line("Correct!");
}

function showError($answer, $solution, $name)
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$solution}'.");
    line("Let's try again, {$name}!");
}

function getName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    return $name;
}

<?php

namespace Brain\Even\BEGameLogic;

use function cli\line;
use function cli\prompt;

function run()
{
    $color_red_start = "\033[0;31m";
    $color_end = "\033[0m";
    $min_number = 1;
    $max_number = 100;

    line('Welcome to the Brain Games!');
    line("Answer {$color_red_start}\"yes\"{$color_end} if the number is even, otherwise answer {$color_red_start}\"no\"{$color_end}.");
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    $noErrors = true;
    for ($i = 1; $i <= 3; $i++) {
        $number = rand($min_number, $max_number);
        $isEven = $number % 2 === 0 ? 'yes' : 'no';
        
        line("Question: {$number}");
        $answer = prompt('Your answer');
        
        if ($answer !== $isEven) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$isEven}'.");
            line("Let's try again, {$name}!");
            $noErrors = false;
            break;
        } else {
            line("Correct!");
        }
    }

    if ($noErrors) {
        line("Congratulations, {$name}!");
    }
}

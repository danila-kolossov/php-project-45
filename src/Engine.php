<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function calc(int $a, int $b, string $op): ?int
{
    return match ($op) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        default => null,
    };
}

function game(string $description, array $tasks): bool|int
{
    line($description);

    $error = 0;

    foreach ($tasks as $task) {
        $error += question($task[0], $task[1]);
    }

    return $error;
}

function generateCalcExpression(): array
{
    $operations = array('+', '-', '*');
    $a = rand(0, 25);
    $b = rand(0, 25);
    $op = $operations[rand(0, 2)];
    $expression = "$a $op $b";
    $answer = calc($a, $b, $op);
    return array($expression, $answer);
}

function getName(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function question(string $question, string $answer): bool
{
    line("Question: $question");
    $userAnswer = prompt('Your answer: ');
    if ($userAnswer === $answer) {
        line('Correct!');
        return true;
    }
    line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.\nLet's try again, Bill!");
    return false;
}

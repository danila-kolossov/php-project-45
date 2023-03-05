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

function game(string $description, array $tasks, string $name): bool|int
{
    line($description);

    $error = 0;

    foreach ($tasks as $task) {
        $error += question($task[0], $task[1], $name);
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

function generatePrime(): array
{
    $a = rand(3, 100);
    $answer = 'no';
    if (isPrime($a)) {
        $answer = 'yes';
    }
    return array($a, $answer);
}

function generateProgression(): array
{
    $n = rand(5, 10);
    $hidden = rand(0, $n - 1);
    $diff = rand(1, 10);
    $start = rand(0, 20);
    $members = [];
    $answer = null;

    for ($i = 0; $i < $n; $i++) {
        if ($i === $hidden) {
            $members[] = '..';
            $answer = $start;
        } else {
            $members[] = $start;
        }
        $start += $diff;
    }
    return array(implode(' ', $members), $answer);
}

function gcd(int $a, int $b): int
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function generateGCD(): array
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    $expression = "$a $b";
    $answer = gcd($a, $b);
    return array($expression, $answer);
}

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    return $name;
}

function isPrime(int $a): bool
{
    for ($i = 2; $i < $a; $i++) {
        if ($a % $i === 0) {
            return false;
        }
    }
    return true;
}

function question(string $question, string $answer, string $name): bool
{
    line("Question: $question");
    $userAnswer = prompt('Your answer');
    if ($userAnswer === $answer) {
        line('Correct!');
        return true;
    }
    line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.\nLet's try again, $name!");
    exit;
}

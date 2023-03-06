<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', 'Noname', ' ');
    line("Hello, %s!", $name);
    return $name;
}

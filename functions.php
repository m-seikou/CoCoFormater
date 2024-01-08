<?php

function readSTDIN(): string
{
    $string = '';
    while ($line = fgets(STDIN)) {
        $string .= str_replace('<br>', "\n", $line);
    }
    return $string;
}


<?php

function factorial($num) {
    $factorial = $num;
    for ($i=1; $i < $num; $i++) { 
        $factorial = $factorial * $i;
    }
    echo $factorial;
}

factorial(5);
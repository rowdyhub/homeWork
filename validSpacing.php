<?php
// https://www.codewars.com/kata/5f77d62851f6bc0033616bd8

function validSpacing(string $str): bool{
    if(trim($str)!=$str) return false;
    else{
        for($i = 0; $i<strlen($str); $i++){
            if($str[$i] === $str[$i+1] and $str[$i] === ' ') return false;
        }
        return true;
    }
}

$b = 'Hello w o rld';
echo(validSpacing($b));

?>
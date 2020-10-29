<?php 
function factorial(int $a, $b=1): int{
        for($i=1; $i<=$a; $i++){
            $b*=$i;
        }
        return $b;
}

echo factorial(12);
?>
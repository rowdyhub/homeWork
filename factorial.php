<?php 
function factorial($a, $b=1){
    
        $a = (int)$a;
        for($i=1; $i<=$a; $i++){
            $b*=$i;
        }
        return $b;
}

echo factorial(4);
?>
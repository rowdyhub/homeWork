<?php

$array = [0,1,2,3,4,5];


function partsSums($ls) {
  $a = [array_sum($ls)];
  for($b=0; $b < count($ls); $b++){
    $a[] = $a[$b];
    $a[$b+1]-=$ls[$b];
  }
  return $a;
}





print_r(partsSums($array));


?>
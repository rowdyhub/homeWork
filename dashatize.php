<?php

// https://www.codewars.com/kata/58223370aef9fc03fd000071


$input = 5311;

/*function dashatize($input){
    $input = $input<0 ? -$input : $input;
    setType($input, "string");
    if(strlen($input) > 1){
        $array = [];
        if($input[0]%2 == 1){
            $array[] = $input[0].'-';
        }
        else{
            $array[] = $input[0];
        }
        for($i=1; $i < strlen($input)-1; $i++){
            if($input[$i]%2 == 1){
                $array[] = '-'.$input[$i].'-';
            }
            else{
                $array[] = $input[$i];
            }
        }
        if($input[strlen($input)-1]%2 == 1){
            $array[] = '-'.$input[strlen($input)-1];
        }
        else{
            $array[] = $input[strlen($input)-1];
        }

        $output = implode('', $array);
        $output = str_ireplace("--", "-", "$output");
        
        return $output;
    }
    else{
        return $input;
    }
}*/
//REF_0
/*function dashatize(int $input): string{
    $input = $input<0 ? -$input : $input; //Приводим число к положтельному
    setType($input, "string"); //Приводим к строке
    if(strlen($input) > 1){ //Если содежит более чем 1 симол - далее
        $array = [];
        for($i=0; $i < strlen($input); $i++){ // Перебираем строку посимвольно
            if($input[$i]%2 == 1){        //Если нечетное, то проверяем далее
                if($input[$i-1]==null){     //Если это первый нечетный символ строки, ставим дефиз только после него
                    $array[] = $input[$i].'-';
                }
                else if($input[$i+1]==null){    //Если это последний нечетный символ строки, ставим дефиз только перед ним
                    $array[] = '-'.$input[$i];
                }
                else{ //если нечетное, не первое и не последнее - далее
                    if($array[$i-1] == '-'.$input[$i-1].'-'){ //если у предыдущего записанного элемента есть дефизы(на нечетность не можем проверить, т.к. это уже строка с дефизами), то пишем дефиз только после него
                        $array[] = $input[$i].'-';
                    }
                    else{   //если предыдущий элемент записывался без дефизов, то пишем дефизы с обеих сторон
                        $array[] = '-'.$input[$i].'-';
                    }
                }
            }
            else{ //Если содежит 1 симол, так и записываем
                $array[] = $input[$i];
            }
        }
        $output = implode('', $array); //собираем из массива строку
        
        $output = str_ireplace("--", "-", "$output");
        return $output; // отдаем готовую строку
    }
    else{
        return $input;
    }
}*/
//REF_1
function dashatize(int $input): string {
    $input = $input<0 ? -$input : $input;
    setType($input, "string");
    if(strlen($input) > 1){
        $array = [];
        for($i=0; $i < strlen($input); $i++){
            if($input[$i]%2 == 1){
                if($input[$i-1]==null) $array[] = $input[$i].'-'; 
                else if($input[$i+1]==null) $array[] = '-'.$input[$i];
                else{
                    if($array[$i-1] == '-'.$input[$i-1].'-') $array[] = $input[$i].'-';
                    else $array[] = '-'.$input[$i].'-';
                }
            }
            else $array[] = $input[$i]; 
        }
        return str_ireplace("--", "-", implode('', $array));
    }
    else return $input; 
}

echo dashatize($input);


?>
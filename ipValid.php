<?php 
function isValidIP(string $str): bool
{
    // Это решается в одну строчку
    // return filter_var($str,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4);


    $val = true;
    $inval = false;
    $pat = "/[a-zA-Zа-яёА-ЯЁ[:punct:]^( .+|.+ )$]/";
    if($str !== ''){
        $ipArray = explode(".", $str);
        if(count($ipArray) == 4){
            for($i=0; $i<4; $i++){
                if(preg_match($pat, $ipArray[$i])===1){
                    return $inval;
                }
                else {
                    if($ipArray[$i]>=0 && $ipArray[$i]<=255){
                    }
                    else {
                        return $inval;
                    }
                }
            }
            return $val;
        }
        else {
            return $inval;
        }
    }
    else {
        return $inval;
    }
    
}
echo isValidIP('0.200.100.255');
?>
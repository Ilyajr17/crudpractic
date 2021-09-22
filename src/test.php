<?php

$str ='test';

$result = mb_strtolower($str);


$pieces = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);


function remprobel($str)
{


    $newstr = '';
for ($i = 0 ;$i < strlen($str); $i +=1) {
    if ($str[$i] == ' ' && $str[$i +1] == ' ') {
       
    } else {
        $newstr = "{$newstr}{$str[$i]}";
    
    }


}


$strminus = '';

for ($i = 0 ;$i < strlen($newstr); $i +=1) {
    if ($newstr[$i] == ' ') {
        $strminus = "{$strminus}-";
    } else {
        $strminus = "{$strminus}{$newstr[$i]}";
    
    }


}


$lower = mb_strtolower($newstr);




$array = explode(' ', $lower);




$result = mb_strtolower($strminus);

return $result;

}

print_r(remprobel($str));

//print_r($pieces[7]);


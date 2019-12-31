<?php
function estimate($operator,$filename){
    $fp = fopen(__DIR__.'\\'.$filename,'r');
    $positives = fopen(__DIR__.'\positives.txt','w');
    $negatives = fopen(__DIR__.'\negatives.txt','w');

    $i=1;
    if($fp){
        while(!feof($fp)){
            $text = fgets($fp);
            (float)$arr = explode(' ',$text);
            if($operator=='+')
                $tmp = $arr[0]+$arr[1];
            else if($operator=='-')
                $tmp = $arr[0]-$arr[1];
            else if($operator=='*')
                $tmp = $arr[0]*$arr[1];
            else if($operator=='/')
                if($arr[1]==0) $tmp = 'Devide to zero!';
                else
                $tmp = $arr[0]/$arr[1];
            if($tmp>0)
                fwrite($positives,$i.') '.$tmp.'; ');
            else
                fwrite($negatives,$i.') '.$tmp.'; ');
            $i++;
        }
    }else{
        echo "File not exists";
    }
    fclose($positives);
    fclose($negatives);
    fclose($fp);
}

estimate("-","file.txt");

//estimate("+","file.txt");
//estimate("*","file.txt");
//estimate("/","file.txt");

?>
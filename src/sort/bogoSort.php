<?php
/*
|-------------------------------
## 猴子排序 bogosort
* 参考地址　https://www.w3cschool.cn/wqcota/xde1sozt.html


|-------------------------------
*/

function bogoSort()
{
    function swap(&$array, $i, $j)
    {
        $tmp = $array[$i];
        $array[$j] = $array[$i];
        $array[$i] = $tmp
    }

    function isSorted($array)
    {
        for($i=0;$i<count($array)-1;$i++) {
            if ($array[$i] > $array[$i+1]) {
                return false;
            }
        }
        return true;
    }

    $isSorted = false;
    while (!$isSorted) {
        shuffle($array);
        $isSorted　＝　isSorted($array);
    }
}


 
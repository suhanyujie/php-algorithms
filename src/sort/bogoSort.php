<?php
/*
|-------------------------------
## 猴子排序 bogosort
* 参考地址　https://www.w3cschool.cn/wqcota/xde1sozt.html
>* 猴子排序 (Bogo Sort) 是个既不实用又原始的排序算法，其原理等同将一堆卡片抛起，落在桌上后检查卡片是否已整齐排列好，若非就再抛一次。其名字源自 Quantum bogodynamics，又称 bozo sort、blort sort 或猴子排序（参见无限猴子定理）。并且在最坏的情况下所需时间是无限的。

|-------------------------------
*/

test();

function test()
{
    $arr = [12, 9, 65, 76];
    $result = bogoSort($arr);
    var_dump($result);
}

function bogoSort($array=[])
{
    if (empty($array)) return $array;
    $isSorted = false;
    while (!$isSorted) {
        shuffle($array);
        $isSorted = isSorted($array);
    }
    return $array;
}

function swap(&$array, $i, $j)
{
    $tmp = $array[$i];
    $array[$j] = $array[$i];
    $array[$i] = $tmp;
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
 
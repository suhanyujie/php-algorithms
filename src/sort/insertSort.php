<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-09-11
 * Time: 10:50
 */


/*
|--------------------------------
## 名称：插入排序
- 从第而个数开始，逐个与前面所有的数进行比较（前面所有的数已经是有序的），如果当前"比较的数"小，则交换

|--------------------------------
*/
function main()
{
    $exampleArr = [21, 10, 76, 34, 31, 19];
    $afterSortArr = insertSort($exampleArr);
    var_dump($afterSortArr);
}

main();

function insertSort($arr = [])
{
    if (empty($arr))return $arr;
    $len = count($arr);
    if ($len <= 1) return $arr;
    for ($i=1;$i<$len;$i++) {
        $cmpNum = $arr[$i];
        for ($j=$i-1;$j>=0;$j--) {
            if ($cmpNum < $arr[$j]) {
                $tmp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }

    return $arr;
}

<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-09-11
 * Time: 09:20
 */

/*
|--------------------------------
## 名称：快速排序
- 快速排序主要是利用了分治的思想。拿出一个数值，作为将一分为二的中间数。随后再递归调用
- 值得注意的是，quikSort 中返回合并数组时，需要用 array_merge。数组相加（+）时，对于重复键的数据是不会合并进入结果集的。

|--------------------------------
*/
function main()
{
    $arr = [89, 76, 65, 4, 72, 87, 126, 73];
    $res = quikSort($arr);
    var_dump($res);
}

main();

function quikSort($arr = [])
{
    if (empty($arr)) return $arr;
    if (count($arr) <= 1) return $arr;
    $pilotNum  = array_pop($arr);
    $leftGroup = $rightGroup = [];
    foreach ($arr as $k=>$item) {
        if ($item <= $pilotNum) {
            array_push($leftGroup, $arr[$k]);
        } else {
            array_push($rightGroup, $arr[$k]);
        }
    }

    return array_merge(quikSort($leftGroup), [$pilotNum], quikSort($rightGroup));
}


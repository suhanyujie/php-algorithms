<?php
/**
 * 题目地址 https://leetcode-cn.com/problems/longest-consecutive-sequence/
 * 参考 https://leetcode-cn.com/problems/longest-consecutive-sequence/solution/9xing-pythondai-ma-hen-rong-yi-li-jie-by-matrix95/
 */


/**
 * Class Solution
 */
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums)
    {
        $res = 0;
        foreach ($nums as $num) {
            if (!in_array($num-1, $nums)) {
                $y = $num + 1;
                while (in_array($y, $nums)) {
                    $y += 1;
                }
                $res = max($res, $y - $num);
            }
        }
        return $res;
    }
}

function test()
{
    $arr = [100, 4, 200, 1, 3, 2];
    $res = (new Solution)->longestConsecutive($arr);
    var_dump($res);
}

test();
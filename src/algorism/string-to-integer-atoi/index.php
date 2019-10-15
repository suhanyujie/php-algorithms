<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-10-03
 * Time: 23:06
 */


class Solution {

    /**
     * 1.判断是否是 '0'~'9' 的字符
     *
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $num = 0;
        $flag = 1;
        $i32Max = (1<<31) - 1;
        $i32Min = -(1<<31);
        $str = trim($str);
        $isSetFlag = false;
        for ($i=0;$i<strlen($str);$i++) {
            if (!$isSetFlag && $i === 0 && $this->isFlag($str[$i])) {
                if ($str[$i] === '-') {
                    $flag *= -1;
                } else if ($str[$i] === '+') {
                    $flag *= 1;
                }
                $isSetFlag = true;
                continue;
            }
            if ($this->isDigit($str[$i])) {
                $num = $num * 10 + $str[$i];
                // 溢出时的处理
                if ($flag < 0) {
                    if ($num >= ($i32Max+1)) {
                        return $i32Min;
                    }
                } else {
                    if ($num >= $i32Max) {
                        return $i32Max;
                    } elseif($num <= $i32Min) {
                        return $i32Min;
                    }
                }
            } else {
                break;
            }
        }
        return $num * $flag;
    }

    /**
     * @desc 判断是否是数字字符
     */
    public function isDigit($char='')
    {
        return $char >= '0' && $char <= '9';
    }

    /**
     * @desc
     */
    public function isFlag($char='')
    {
        return $char == '-' || $char == '+';
    }
}

function test()
{
//    $testData = "15.23abc";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = '-111.98k';
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "-91283472332";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "--91283472332";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = " -42";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "   +0 123";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "+-123";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "42";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
//    $testData = "-2147483647";
//    $res = (new Solution)->myAtoi($testData);
//    var_dump($res);
    $testData = "0-1";
    $res = (new Solution)->myAtoi($testData);
    var_dump($res);

}

test();

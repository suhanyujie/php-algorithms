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
        $i32Max = 1<<32 - 1;
        for ($i=0;$i<strlen($str);$i++) {
            if ($str[$i] === ' ') {
                continue;
            }
            if ($this->isFlag($str[$i])) {
                if ($str[$i] === '-') {
                    $flag = -1;
                }
                continue;
            }
            if ($this->isDigit($str[$i])) {
                $num = $num * 10 + $str[$i];
                if ($num > $i32Max) {
                    $num = $i32Max;
                    break;
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
    $testData = "15.23abc";
    $res = (new Solution)->myAtoi($testData);
    var_dump($res);
    $testData = '-111.98k';
    $res = (new Solution)->myAtoi($testData);
    var_dump($res);
    $testData = "-91283472332";
    $res = (new Solution)->myAtoi($testData);
    var_dump($res);

}

test();

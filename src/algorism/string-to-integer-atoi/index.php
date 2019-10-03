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
        for ($i=0;$i<strlen($str);$i++) {
            if ($this->isDigit($str[$i])) {
                $num = $num * 10 + $str[$i];
            } else {
                break;
            }
        }
        return $num;
    }


    /**
     * @desc 判断是否是数字字符
     */
    public function isDigit($char='')
    {
        return $char >= '0' && $char <= '9';
    }
}

function test()
{
    $testData = "15.23abc";
    $res = (new Solution)->myAtoi($testData);
    var_dump($res);
}

test();

<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 将字符解析成数组
 * @param $str
 */
function parseParams($str)
{
    $arrParams = [];
    $str =  str_replace("%26","@1#3!86",$str);
    parse_str(html_entity_decode(urldecode($str)), $arrParams);
    function strReplace(&$array) {
        $array = str_replace('@1#3!86', '&', $array);
        if (is_array($array)) {
            foreach ($array as $key => $val) {
                if (is_array($val)) {
                    strReplace($array[$key]);
                }
            }
        }
    }
    strReplace($arrParams);
    return $arrParams;
}
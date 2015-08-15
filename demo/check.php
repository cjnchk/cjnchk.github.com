#!/usr/bin/php
<?php
/*
 * 排序插入 兼容 二分查找
 * @param   $array          array            Y 数组
 * @param   $v              string           Y 要找的值
 * @param   $low            int              N 查找范围的最小键值
 * @param   $high           int              N 范围的最大键值
 * @return  $array || $mid  array || int     如果不存在返回插入且已排序数组 || 如果存在返回所在位置
 */
function binInsert($array,$v,$low=0,$high=0){
    //判断是否第一次调用
    if($high == 0){
        $high = count($array);
        //排除首项相等
        if($array[0] == $v){
            return 0;
        }
    }
    //结束递归并插入
    $diff = $high - $low;
    if($diff == 0 || $diff == 1){
        array_splice($array, $low+1, 0, $v);
        //排除空数组首项
        if($diff == 0){
            $array['current'] = $low;
        }else{
            $array['current'] = $low + 1;
        }
        return $array;
    }
    //如果还存在剩余数组元素
    if($low<$high){
        //取$low和$high的中间值
        $mid = intval(($low+$high)/2);
        //比对并递归
        if($v == $array[$mid]){
            return $mid;
        }elseif($v < $array[$mid]){
            return binInsert($array, $v, $low, $mid);
        }else{
            return binInsert($array, $v, $mid, $high);
        }
    }
    return 1;
}

$arr = [3, 1, 2, 5];
$res = binInsert($arr, 4);
var_dump($res);

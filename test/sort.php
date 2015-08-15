#!/usr/bin/php
 <?php
    /**
     * 快速排序(最多支持三维数据,)
     * @param  $arr       array     排序数组 eg:$array = [[300,30,3],[300,40,2],[100,10,1],[100,10,2]];
     * @param  $order     int       排序依据 0正序，1逆序
     * @return $new_array array     返回排序后数组
     */
    function quickSort($arr){
        if (count($arr) <= 1) {
            return $arr;
        }
        $key = $arr[0];
        $left_arr = array();
        $right_arr = array();
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] < $key) {
                    $left_arr[] = $arr[$i];
            } elseif ($arr[$i][0] < $key[0]) {
                $left_arr[] = $arr[$i];
            } elseif ($arr[$i] == $key) {
                if ($arr[$i][1] < $key[1]) {
                    $left_arr[] = $arr[$i];
                } elseif ($arr[$i][1] == $key[1]) {
                    if ($arr[$i][2] < $key[2]) {
                        $left_arr[] = $arr[$i];
                    }
                }
            } else {
                $right_arr[] = $arr[$i];
            }
        }
        $left_arr = quickSort($left_arr);
        $right_arr = quickSort($right_arr);
        return array_merge($left_arr,array($key),$right_arr);
    }

   $arr = [3, 2, 1, 4];
   //$arr = [[300,30],[300,40],[100,10],[100,10]];
    $newarr = quickSort($arr);
    var_dump($newarr);

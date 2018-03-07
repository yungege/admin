<?php
/**
* 公共函数
*/

class CommonFuc
{
    public static function getProvince(){
        $provinceModel = Dao_ProvinceModel::getInstance();
        $option = [
            'limit' => 0,
        ];
        return $provinceModel->query([], $option);
    }

    // 获取卡路里
    public static function calCalorie($distance, $time , $weight = 35){
        $k = 0;
        $v = ($distance / $time) * 3.6; //转换成$km/h
        
        if ($v <= 8) {
            $k = 0.1355;
        } else if ($v <= 15) {
            $k = 0.1797;
        } else if ($v < 40) {
            $k = 0.1875;
        } else {
            $k = 0.1355;
        }
        return floatval($weight * $time/60 * $k);
    }

    /**
     * 获取redis缓存键
     * @Author    422909231@qq.com
     * @DateTime  2017-07-05
     * @version   [version]
     * @param     string           $uniqueFlag
     * @param     string           $type  session homeword project action train_history
     * @return
     */
    public static function getRedisKey($uniqueFlag, string $type = 'session'){
        if(empty($uniqueFlag) || !preg_match("/\w+/", $uniqueFlag)){
            throw new Exception("get redis key 'uniqueFlag' empty", -1);
        }
        $key = 'ttxs_redis_' . $type . '_' . $uniqueFlag;
        return $key;
    }

    public static function arraySort($array, $key){ 
        if(is_array($array)){ 
            $key_array = null; 
            $new_array = null; 
            for( $i = 0; $i < count( $array ); $i++ ){ 
                $key_array[$array[$i][$key]] = $i; 
            } 
            ksort($key_array); 
            $j = 0; 
            foreach($key_array as $k => $v){ 
                $new_array[$j] = $array[$v]; 
                $j++; 
            } 
            unset($key_array); 
            return $new_array; 
        }else{ 
            return []; 
        } 
    } 

        // excel 头
    public static function xlsWriteHeader($outputFileName, $head, $separator = "\t")
    {
        if (file_exists($outputFileName)) {
            unlink($outputFileName);
        }
        // 输出表头
        $headStr = '';
        foreach ($head as $hh) {
            $headStr .= $hh . $separator;
        }
        $headStr = rtrim($headStr, $separator) . "\n";
        $headStr = mb_convert_encoding($headStr, "GBK", "UTF-8");
        file_put_contents($outputFileName, $headStr, FILE_APPEND);
    }

    // excel 内容
    public static function xlsWriteContent($outputFileName, $headKeys, $data, $separator = "\t")
    {
        foreach ($data as $row) {
            $str = '';
            for ($i = 0; $i < count($headKeys); $i++) {
                $column = mb_convert_encoding($row[$headKeys[$i]], 'GBK', 'UTF-8');
                $str .= $column . $separator;
            }
            file_put_contents($outputFileName, rtrim($str, $separator) . "\n", FILE_APPEND);
        }
    }
}
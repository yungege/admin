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
}
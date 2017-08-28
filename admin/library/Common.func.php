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
}
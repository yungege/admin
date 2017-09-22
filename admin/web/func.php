<?php

function getUploadToken($bkt = 'ugcimg'){
    $url = 'https://api.ttxstech.com/qiniu/token?bucket=' . $bkt;
    $json = HttpCurl::request($url, 'get')[0];

    return json_decode($json, true)['data']['uptoken'];
}

function xlsHeader($head, $fileName, $separator = "\t")
{
    header("Content-type:application/x-xls");
    header("Content-Disposition:attachment;filename=" . $fileName . '.xls');
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');

    // 输出表头
    $headStr = '';
    foreach ($head as $hh) {
        $headStr .= $hh . $separator;
    }
    $headStr = rtrim($headStr, $separator) . "\n";
    $headStr = mb_convert_encoding($headStr, "GBK", "UTF-8");
    echo $headStr;
}


function xlsOutput($headKeys, $data, $separator = "\t")
{
    // 输出内容
    foreach ($data as $row) {
        $str = '';
        for ($i = 0; $i < count($headKeys); $i++) {
            $column = mb_convert_encoding($row[$headKeys[$i]], 'GBK', 'UTF-8');
            $str .= $column . $separator;
        }
        echo rtrim($str, $separator) . "\n";
        ob_flush();
        flush();
    }
}

function rootTree(array $items, $childName = 'sub', $key = true){
    foreach ($items as $item) {
        if ($key) {
            $items[$item['pid']][$childName][$item['_id']] = &$items[$item['_id']];
        } else {
            $items[$item['pid']][$childName][] = &$items[$item['_id']];
        }
    }
    return isset($items[''][$childName]) ? $items[''][$childName] : array();
}
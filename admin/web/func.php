<?php

function getUploadToken($bkt = 'ugcimg'){
    $url = 'https://api.ttxstech.com/qiniu/token?bucket=' . $bkt;
    $json = HttpCurl::request($url, 'get')[0];

    return json_decode($json, true)['data']['uptoken'];
}
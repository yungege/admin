<?php
function smarty_modifier_ttxs_parse_stamp($stamp) {
    $yearDiffer = floor($stamp / (3600 * 24 * 365));

    if ($yearDiffer == 0) {
        $monthDiffer = floor($stamp / (3600 * 24 * 30));

        if ($monthDiffer == 0) {
            $dayDiffer = floor($stamp / (3600 * 24));

            if ($dayDiffer == 0) {
                $hourDiffer = floor($stamp / 3600);

                if ($hourDiffer == 0) {
                    $minuteDiffer = floor($stamp / 60);

                    if ($minuteDiffer == 0) {
                        return "无限制";
                    }
                    else {
                        return $minuteDiffer . '分钟';
                    }
                }
                else {
                    return $hourDiffer . '小时';
                }
            }
            else {
                return $dayDiffer . '天';
            }
        }
        else {
            return $monthDiffer . '个月';
        }
    }
    else {
        return $yearDiffer . '年';
    }
} 

?>
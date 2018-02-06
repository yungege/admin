<?php
class Service_Stat_TrainStatModel extends BasePageService {

    protected $schoolId;
    protected $schoolModel;
    protected $userModel;
    protected $trainModel;
    protected $statData = [];
    protected $gradeNo = [11,12,13,14,15,16];
    protected $classModel;
    protected $trainOutsideModel;
    protected $punchModel;

    protected $startTime;
    protected $endTime;
    protected $userIds;

    public function __construct() {
        ob_start(); //打开缓冲区
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $this->punchModel = Dao_PunchModel::getInstance();
        $this->startTime = 1515945600;
        $this->endTime = 1516550399;
    }

    protected function __declare() {

    }

    protected function __execute($req) {

        $content = "<tr >  
        <td width='70' height='80' valign='center' align='center' style='font-weight:bold;font-size:15px;background:#DDDDDD'>班级名</td>  
        <td width='60' height='80' valign='center' align='center' style='font-weight:bold;font-size:15px;background:#DDDDDD'>锻炼次数</td>  
        <td width='425' height='80' valign='center' align='center' style='font-weight:bold;font-size:15px;background:#DDDDDD'>学生名单</td>  
        </tr>";

        $this->schoolId = "587f31732a46800e0a8b4567";
        $schoolFields = ['name'];
        $schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFields);

        $classWhere = [
            'schoolid' => $this->schoolId,
            'is_test' => ['$ne' => 1],
            'grade' => ['$in' => $this->gradeNo],
            'branch_school' => null,
        ];
       
        $classOptions = [
            'projection' => ['name' => 1 ,'_id' => 1,'grade' => 1,'classno' => 1],
            'sort' => ['grade' => 1,'classno' => 1]
        ];

        $classInfos = $this->classModel->query($classWhere,$classOptions);
        $arr1 = [];
        $arr2 = [];
        foreach($classInfos as $v){  
            
            $arr1[] = $v['grade'];  
            $arr2[] = (int)$v['classno'];
        }  

        array_multisort($arr1, SORT_ASC,$arr2, SORT_ASC ,$classInfos);
        $classInfos = array_column($classInfos,null,'name');
        
        $i = 2;
        foreach($classInfos as $classInfo){

            $userWhere = [
                'classinfo.classid' => $classInfo['_id'],
                'type' => 1,
            ];
            $option['projection'] = ['username' => 1,'ssoid' => 1,'mobileno' => 1,'_id' => 1, 'schoolinfo' => 1,'grade' => 1,'classinfo'=>1];
            $userInfos = $this->userModel->query($userWhere,$option);
            if(empty($userInfos)){
                break;
            }

            $className = $userInfos[0]['classinfo']['classname'];

            $this->userIds = array_column($userInfos,'_id');
            $userCount = count($this->userIds);

            $where = [
                'starttime' => [
                    '$gte' => $this->startTime,
                    '$lte' => $this->endTime,
                ],
                'htype' => [
                    '$in' => [1,2,3,4,5,6,7],
                ],
                'userid' => [
                    '$in' => $this->userIds,
                ],
            ];

            $fields = [
                '$project' => [
                    'userid' => 1,
                    'htype' => 1,
                ]
            ];

            $group = [
                '$group' => [
                    '_id' => '$userid',
                    'count' => ['$sum' => 1],
                    'htype' => ['$push' => '$htype'],
                ]
            ];
            $aggregate = [
                ['$match' => $where],
                $fields,
                $group
            ];

            $list = $this->trainModel->aggregate($aggregate);

            if(!empty($list)){
                $list = array_column($list,'count','_id');
            }else{
                $list = [];
            }

            $list2 = $this->trainOutsideModel->aggregate($aggregate);
            if(!empty($list2)){
                $list2 = array_column($list2,'count','_id');
                foreach($list2 as $key => $value){
                    if(empty($list[$key])){
                        $list[$key] = $value;
                    }else{
                        $list[$key] += $value;
                    }
                }
            }

            $list3 = $this->punchModel->aggregate($aggregate);
            if(!empty($list3)){
                $list3 = array_column($list3,'count','_id');
                foreach($list3 as $key => $value){
                    if(empty($list[$key])){
                        $list[$key] = $value;
                    }else{
                        $list[$key] += $value;
                    }
                }
            }

            $lists = [];
            foreach($list as $key => $value){
               
                if(empty($lists[$value])){
                    $lists[$value] = [$key];
                }else{
                    $lists[$value][] = $key;
                }
            }

            $count = 0;
            foreach($lists as $key => $value){
                if($key >= 4){
                    $count++;
                }
            }

            $doneUser = array_keys($list);
            $noUser = array_diff($this->userIds,$doneUser);
            $lists[0] = $noUser;
            ksort($lists);

            $ranking = [];
            $userInfos = array_column($userInfos,'username','_id');
            foreach($lists as $key => $value){
                $ranking[$key] = [];
                foreach($value as $v){
                    array_push($ranking[$key],$userInfos[$v]);
                }
            }

            $colNo = count($ranking);
            $content .= "<tr > <td width='70' valign='center' align='center' style='font-size:15px' rowspan=$colNo>$className</td>";
            foreach($ranking as $k => $v){
                
                $count = count($v);
                $v = implode(',',$v);
                if($k == 0){
                    $k = $k . '(人数' . $count . ')';
                }
                
                $content  .= " 
                <td width='60' valign='center' align='center' style='font-size:15px'>$k</td>  
                <td width='425' valign='center' align='center' style='font-size:15px'>$v</td>  
                </tr>";
            }
        }
        
        $this->uploadWord($content,$schoolInfo[name]);
    }


    protected function uploadWord($content,$school){

        echo '  
        <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">  
        <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  
        <xml><w:WordDocument><w:View>Print</w:View></xml>  
        </head>';

        $startTime = date('Y年m月d日',$this->startTime);
        $endTime = date('Y年m月d日',$this->endTime);
        $body = "<body>  <h1 style='text-align:center ; font-weight:bold'> $school" . "锻炼统计详情 </h1>  <h3 style='font-weight:bold;font-size:20px'>锻炼统计时间 ：$startTime 到 $endTime</h3> <table border='1' cellpadding='5' cellspacing='0' style='margin:auto'> $content </table> </body>";
        echo $body;

        header("Cache-Control: public");  
        Header("Content-type: application/octet-stream");  
        Header("Accept-Ranges: bytes");  
        if (strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')) {  
        header("Content-Disposition: attachment; filename=$school" . "_锻炼统计.doc");  
        }else if (strpos($_SERVER["HTTP_USER_AGENT"],'Firefox')) {  
        Header("Content-Disposition: attachment; filename=$school" . "_锻炼统计.doc");  
        } else {  
        header("Content-Disposition: attachment; filename=$school" . "_锻炼统计.doc");  
        }  
        header("Pragma:no-cache");  
        header("Expires:0");  
        ob_end_flush();//输出全部内容到浏览器 
    }

}
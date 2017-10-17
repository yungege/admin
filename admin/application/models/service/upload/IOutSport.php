<?php
class Service_Upload_IOutSportModel extends BasePageService {

	protected $trainSchoolModel;
	protected $trainOutModel; 
	protected $userModel;
    protected $trainDoneOutsideModel;
    protected $trainModel;
	protected $resData = [];
    protected $startTime;
    protected $endTime;
    protected $type;
    protected $workData;
    protected $userData;
    protected $workId;
    protected $schoolId;

	public function __construct(){

		$this->trainSchoolModel = Dao_SchoolInfoTrainingModel::getInstance();
		$this->trainOutModel = Dao_TrainingHomeworkModel::getInstance();
        $this->trainDoneOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
		$this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){
        set_time_limit(0);
		$req = $req['post'];

        // var_dump($req);
        // exit;

        $_FILES = $_FILES[0];
        $ext = $this->getExt($_FILES['name']);
        if($ext != "xls" && $ext != "xlsx"){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }
 
        if(empty($req['time']) &&empty($req['school']) && !preg_match('/\w+/',$req['school'])){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }
        $this->startTime = $req['time'];
        $this->schoolId = $req['school'];

        $datas = $this->importExcel($_FILES['tmp_name'],$ext);
        unset($datas[1]);
		$this->load($datas);

        return ;
	}

	protected function getExt($fileName) {

        return strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    }


    protected function load($datas){

        foreach($datas as $data){

            $userWhere = [
                'username' => $data[0],
                'classinfo.classname' => $data[1],
                'schoolinfo.schoolid' => $this->schoolId,
            ];

            $options['projection'] = ['_id' => 1];
            $this->userData = $this->userModel->queryOne($userWhere,$options);

            if(empty($this->userData) || empty($data[2]) ||empty($data[5])){
                $data[8] = "信息不全";
                $err = file_put_contents('/tmp/upload.txt',$data ,FILE_APPEND);
                $err = file_put_contents('/tmp/upload.txt',"\r\n" ,FILE_APPEND);
                continue;
            }

            $workData['train_name'] = $data[2];
            $workData['start_time'] = (int)strtotime($this->startTime . '00:00:00');
            $workData['end_time'] = (int)strtotime($this->startTime . '23:59:59');
            $workData['done_no'] = $data[4];
            $workData['userid'] = (string)$this->userData['_id'];
            $workId = $this->trainOutModel->insert($workData);

            $trainSchool['homework_id'] = (string)$workId;
            $trainSchool['school_name'] = $data[5];
            $trainSchool['mobile'] = $data[7];
            $this->trainSchoolModel->insert($trainSchool);
            
            $doneOutside['htype'] = 4;
            $doneOutside['userid'] = (string)$this->userData['_id'];
            $doneOutside['starttime'] = (int)strtotime($this->startTime . '08:00:00');
            $doneOutside['endtime'] = (int)strtotime($this->startTime . '09:00:00');
            $doneOutside['createtime'] = $doneOutside['endtime'];
            $doneOutside['homeworkid'] = $workId;
            $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
            $doneOutside['commenttext'] = '兴趣班';
            $doneOutside['status'] = 0;
            $doneOutside['train_name'] = $data[2];   
            $result = $this->trainDoneOutsideModel->insert($doneOutside);

            //写入缓存 后期加入消息队列
            $monthDate = date('Y_m', $doneOutside['endtime']);
            $this->AddCache((string)$this->userData['_id'], $monthDate, $result, $doneOutside);

        }
            return ;

    }


    protected function loadbackup($datas) {

    	foreach($datas as $data){
            $data[0] = (string)$data[0];
            $data[1] = (string)$data[1];
            $data[2] = (string)$data[2];
            $data[3] = (string)$data[3];
            $data[4] = (string)$data[4];
            $data[5] = (string)$data[5];
            $data[6] = (string)$data[6];
            $data[7] = (string)$data[7];
            $this->workData = $data;

    		$userWhere = [
    			'username' => $data[0],
    			'classinfo.classname' => $data[1],
    		];

    		$options['projection'] = ['_id' => 1];
    		$this->userData = $this->userModel->queryOne($userWhere,$options);

            if(empty($this->userData) || empty($data[2]) ||empty($data[5])){
                $data[8] = "信息不全";
                $err = file_put_contents('/tmp/upload.txt',$data ,FILE_APPEND);
                $err = file_put_contents('/tmp/upload.txt',"\r\n" ,FILE_APPEND);
                continue;
            }
            preg_match_all('/(\d+)\.(\d+)\.(\d+)/',$data[3],$start_time);
            $this->startTime = $start_time[1][0] . '-' . $start_time[2][0] . '-' . $start_time[3][0];
            $this->startTime = strtotime($this->startTime);
            preg_match_all('/(\d+)\.(\d+)\.(\d+)/',$data[4],$end_time);
            $this->endTime = $end_time[1][0] . '-' . $end_time[2][0] . '-' . $end_time[3][0];
            $this->endTime = strtotime($this->endTime);
            if($this->endTime > 1505577600 || $this->endTime == false){
                $this->endTime = 1505577600;
            }

            if($this->startTime < 1483200000 || $this->startTime == false){
                $this->startTime = 1483200000;
            }

            if($this->endTime < $this->startTime){
                $data[8] = '时间不对';
                $err = file_put_contents('/tmp/upload.txt',$data ,FILE_APPEND);
                $err = file_put_contents('/tmp/upload.txt',"\r\n" ,FILE_APPEND);
                continue;
            }

            $workData['train_name'] = (string)$data[2];
            $workData['start_time'] = $this->startTime;
            $workData['end_time'] = $this->endTime;
            $workData['done_no'] = $data[5];
            $workData['userid'] = (string)$this->userData['_id'];
            $this->workData = $workData;
            $this->workId = $this->trainOutModel->insert($workData);

            $trainSchool['homework_id'] = (string)$this->workId;
            $trainSchool['school_name'] = (string)$data[6];
            $trainSchool['mobile'] = $data[7];
            $this->trainSchoolModel->insert($trainSchool);

            if(preg_match('/^每周\d次$/',$data[5])){
                $this->type = 1;
                $this->weekDoneNo($data);
            }elseif(preg_match('/^(\d+)次$/',$data[5])){
                $this->type = 2;
                $this->DoneNo($data);
            }elseif(preg_match('/^每周(.*)\d$/',$data[5])){
                $this->type = 3;
                $this->weekNo($data);
            }else{
                $this->type = 4;
                $data[8] = "格式不对";
                $err = file_put_contents('/tmp/upload.txt',$data ,FILE_APPEND);
                $err = file_put_contents('/tmp/upload.txt',"\r\n" ,FILE_APPEND);
                continue;
            }
            unset($workData);
            unset($trainSchool);
            unset($data);
    	}
        
        return ture;

    }

    protected function weekDoneNo($data){

        $startDay = date('w',$this->startTime);
        $startDay = (int)$startDay;
        if($startDay == 0){
            $startDay = 7;
        }
        preg_match_all('/^每周(\d+)次$/',$data[5],$weekDoneNo);
        $startTime = $this->startTime;
        $weekDoneNo = $weekDoneNo[1][0];

        for($i = 1 ,$weekNo = $startDay;$startTime <= $this->endTime;$weekNo++,$i++){

            $doneOutside['htype'] = 4;
            $doneOutside['userid'] = $this->userData['_id'];
            $doneOutside['starttime'] = $startTime + 8 * 3600;
            $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
            $doneOutside['createtime'] = $doneOutside['endtime'];
            $doneOutside['homeworkid'] = $this->workId;
            $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
            $doneOutside['commenttext'] = '兴趣班';
            $doneOutside['status'] = 0;
            $doneOutside['train_name'] = $this->workData['train_name'];    
            $result = $this->trainDoneOutsideModel->insert($doneOutside);
            // 写入缓存 后期加入消息队列
            $monthDate = date('Y_m', $doneOutside['endtime']);
            $this->addCache($this->userData['_id'], $monthDate, $result, $doneOutside);

            if($i == $weekDoneNo || $weekNo == 7){
                $startTime = $startTime + 86400 * (8 - $weekNo);
                $weekNo = 0;
                $i = 0;
            }else{
                $startTime = $startTime + 86400;
            }
        }

        return ture;
    }

    protected function doneNo($data){

        $startDay = date('w',$this->startTime);
        $startDay = (int)$startDay;
        if($startDay == 0){
            $startDay = 7;
        }
        preg_match_all('/^(\d+)次$/',$data[5],$weekDoneNo);
        $startTime = $this->startTime;
        $DoneNo = $weekDoneNo[1][0];

        for($i = 1;$i <= $DoneNo;$i++){
          
            $doneOutside['htype'] = 4;
            $doneOutside['userid'] = $this->userData['_id'];
            $doneOutside['starttime'] = $startTime + 8 * 3600;
            $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
            $doneOutside['createtime'] = $doneOutside['endtime'];
            $doneOutside['homeworkid'] = $this->workId;
            $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];;
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
            $doneOutside['commenttext'] = '兴趣班';
            $doneOutside['status'] = 0;
            $doneOutside['train_name'] = $this->workData['train_name'];
            $result = $this->trainDoneOutsideModel->insert($doneOutside);
            // 写入缓存 后期加入消息队列
            $monthDate = date('Y_m', $doneOutside['endtime']);
            $this->addCache($this->userData['_id'], $monthDate, $result, $doneOutside);
            $startTime = $startTime + 86400;
        }

        return ture;
    }

    protected function weekNo($data){

        $startDay = date('w',$this->startTime);
        if($startDay == 0){
            $startDay = '7';
        }
        preg_match_all('/^每周(.+)$/',$data[5],$weekDoneNo);
        $startTime = $this->startTime;
        $weekDoneNo = $weekDoneNo[1][0];
        $weekDoneNo = explode(',',$weekDoneNo);
        
        $dates = Tools::getWeek($this->startTime,$this->endTime);
        foreach($dates as $startTime => $endTime){
            foreach($weekDoneNo as $values){
                $beginTime = $startTime + $values * 86400;
                if($beginTime >= $this->startTime && $beginTime <= $this->endTime){
                    $doneOutside['htype'] = 4;
                    $doneOutside['userid'] = $this->userData['_id'];
                    $doneOutside['starttime'] = $beginTime + 8 * 3600;
                    $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
                    $doneOutside['createtime'] = $doneOutside['endtime'];
                    $doneOutside['homeworkid'] = $this->workId;
                    $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];;
                    $doneOutside['burncalories'] = mt_rand(90,110);
                    $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
                    $doneOutside['commenttext'] = '兴趣班';
                    $doneOutside['status'] = 0;
                    $doneOutside['train_name'] = $this->workData['train_name'];
                    $result = $this->trainDoneOutsideModel->insert($doneOutside);
                    // 写入缓存 后期加入消息队列
                    $monthDate = date('Y_m', $doneOutside['endtime']);
                    $this->addCache($this->userData['_id'], $monthDate, $result, $doneOutside);
                }
            }  
        }

        return ture;
    }

    // 加入缓存 todo 要加入的月份（当前）如果没有缓存数据 需要当月所有数据放入缓存
    protected function addCache($uId, $monthDate, $trainId, $data){

        $cacheRes = $this->trainDoneOutsideModel->getCacheDataByMonth($uId, $monthDate);
        if(empty($cacheRes)){
            $firstDay = strtotime(date('Y-m-01', $data['endtime']));
            $lastDay = strtotime(date('Y-m-t', $data['endtime']) . ' 23:59:59');
            $hMap = [
                'userid' => $uId,
                'endtime' => ['$gte' => $firstDay, '$lte' => $lastDay]
            ];

            // 锻炼历史
            $options = [
                'sort' => ['endtime' => -1],
            ];
            $fields = ['htype','starttime','endtime','burncalories','originaltime','exciseimg','homeworkid','train_name'];
            $resList = [];
            $this->trainDoneOutsideModel->getListByMonth($hMap, $fields, $options, $monthDate, $resList);
        }
        else{
            $pInterval = 3600;
            if(empty($pInterval)) $pInterval = ($data['endtime'] - $data['starttime']);
            $cacheData = [
                "trainId" => $trainId,
                "pName" => $this->workData['train_name'],
                "pInterval" => 3600,
                "pId" => "",
                "trainingImg" => array_shift($data['exciseimg']),
                "calorie" => $data['burncalories'],
                "finishTime" => $data['endtime'],
                "hType" => $data['htype'],
                "hId" => $data['homeworkid'],
                "originalTime" => strtotime(date('Y-m-d',$data['starttime'])),
            ];
            $this->trainDoneOutsideModel->addCacheDataByMonth($uId, $monthDate, $cacheData);
        }
    }

    protected function importExcel($file,$ext) {

        // 判断文件是什么格式
        ini_set('max_execution_time', '0');
        if($ext == 'xlsx'){
            $type = 'Excel2007';
        }

        if($ext == 'xls'){
            $type = 'Excel5';
        }
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file); 
        $sheet = $objPHPExcel->getSheet(0); 
        // 取得总行数 
        $highestRow = $sheet->getHighestRow();  
        // 取得总列数      
        $highestColumn = $sheet->getHighestColumn(); 
        //循环读取excel文件,读取一条,插入一条
        $data=array();
        //从第一行开始读取数据
        for($j=1;$j<=$highestRow;$j++){

            //从A列读取数据
            for($k='A';$k!=$highestColumn;$k++){
                // 读取单元格
                $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            } 
            $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
        }

        return $data;
    }


}
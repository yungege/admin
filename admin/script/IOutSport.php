<?php
include_once "Cli.php";
$app->execute(['Uploadoutside','init']);
class Uploadoutside {

	protected $trainSchoolModel;
	protected $trainOutModel; 
	protected $userModel;
    protected $trainDoneOutsideModel;
	protected $resData = [];
    protected $startTime;
    protected $endTime;
    protected $type;
    protected $workData;
    protected $userData;
    protected $workId;

	protected function init(){

        $this->trainSchoolModel = Dao_SchoolInfoTrainingModel::getInstance();
        $this->trainOutModel = Dao_TrainingHomeworkModel::getInstance();
        $this->trainDoneOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        set_time_limit(0);
		$req = $req['post'];
        $_FILES = $_FILES[0];
        $ext = $this->getExt($_FILES['name']);
        if($ext != "xls" && $ext != "xlsx"){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }
 
        if(empty($req['school']) && !preg_match('/\w+/',$req['school'])){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $datas = $this->importExcel($_FILES['tmp_name'],$ext);
        unset($datas[1]);
		$this->load($datas);

        return ;
	}

	protected function getExt($fileName) {

        return strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    }

    protected function load($datas) {

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

            // if(empty($userData) || empty($data[2]) ||empty($data[5])){
                
            //     $err = file_put_contents('/tmp/test.txt',$data ,FILE_APPEND);
            //     $err = file_put_contents('/tmp/test.txt',"\r\n" ,FILE_APPEND);
            //     continue;
            // }
            preg_match_all('/(\d+)\.(\d+)\.(\d+)/',$data[3],$start_time);
            $this->startTime = $start_time[1][0] . '-' . $start_time[2][0] . '-' . $start_time[3][0];
            $this->startTime = strtotime($this->startTime);
            preg_match_all('/(\d+)\.(\d+)\.(\d+)/',$data[4],$end_time);
            $this->endTime = $end_time[1][0] . '-' . $end_time[2][0] . '-' . $end_time[3][0];
            $this->endTime = strtotime($this->endTime);

    		$workData['train_name'] = (string)$data[2];
    		$workData['start_time'] = $this->startTime;
    		$workData['end_time'] = $this->endTime;
    		$workData['done_no'] = $data[5];
    		$workData['userid'] = (string)$this->userData['_id'];
    		$this->workId = $this->trainOutModel->insert($workData);

    		$trainSchool['homework_id'] = (string)$this->workId;
    		$trainSchool['school_name'] = (string)$data[6];
    		$trainSchool['mobile'] = $data[7];
    		$this->trainSchoolModel->insert($trainSchool);
            // $this->startTime =  $start_time;

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
            $doneOutside['starttime'] = $startTime + 8 * 3600;
            $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
            $doneOutside['actioncount'] = 1;
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['userid'] = $this->userData['_id'];
            $doneOutside['originaltime'] = $startTime;
            $doneOutside['homeworkid'] = $this->workId;
            $doneOutside['status'] = 0;
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
            $this->trainDoneOutsideModel->insert($doneOutside);

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
            $doneOutside['starttime'] = $startTime + 8 * 3600;
            $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
            $doneOutside['actioncount'] = 1;
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['userid'] = $this->userData['_id'];
            $doneOutside['originaltime'] = $startTime;
            $doneOutside['homeworkid'] = $this->workId;
            $doneOutside['status'] = 0;
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
            $this->trainDoneOutsideModel->insert($doneOutside);
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
                    $doneOutside['starttime'] = $beginTime + 8 * 3600;
                    $doneOutside['endtime'] =  $doneOutside['starttime'] + 3600;
                    $doneOutside['actioncount'] = 1;
                    $doneOutside['burncalories'] = mt_rand(90,110);
                    $doneOutside['userid'] = $this->userData['_id'];
                    $doneOutside['originaltime'] = $beginTime;
                    $doneOutside['homeworkid'] = $this->workId;
                    $doneOutside['status'] = 0;
                    $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
                    $this->trainDoneOutsideModel->insert($doneOutside);
                }
            }  
        }

        return ture;
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
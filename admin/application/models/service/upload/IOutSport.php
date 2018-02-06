<?php
class Service_Upload_IOutSportModel extends BasePageService {

	protected $trainSchoolModel;
	protected $trainOutModel; 
	protected $userModel;
    protected $trainDoneOutsideModel;
    protected $projectModel;
    protected $mProjectModel;
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
        $this->projectModel = Dao_InstitutionProjectModel::getInstance();
        $this->mProjectMoel = Dao_MyInstitutionProjectModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){
        set_time_limit(0);
		$req = $req['post'];

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

            $data[0] = trim((string)$data[0]);
            $data[1] = trim((string)$data[1]);
            $data[2] = trim((string)$data[2]);
            $data[3] = trim((string)$data[3]);
            $data[4] = trim((string)$data[4]);
            $data[5] = trim((string)$data[5]);
            $data[6] = trim((string)$data[6]);
            $data[7] = trim((string)$data[7]);
            $data[8] = trim((string)$data[8]);

            $userWhere = [
                'username' => $data[0],
                'classinfo.classname' => $data[1],
                'schoolinfo.schoolid' => $this->schoolId,
            ];

            $options['projection'] = ['_id' => 1];
            $this->userData = $this->userModel->queryOne($userWhere,$options);


            //  var_dump($this->userData);
            // exit;
            if(empty($this->userData) || empty($data[2]) ||empty($data[5])){
                $data[9] = "信息不全";
                $data[10] = date('Y-m-d',time());
                $err = file_put_contents('/tmp/upload.txt',$data ,FILE_APPEND);
                $err = file_put_contents('/tmp/upload.txt',"\r\n" ,FILE_APPEND);
                continue;
            }

            $where = [
                'starttime' => (int)strtotime($this->startTime . '08:00:00'),
                'train_name' => $data[2],
                'userid' => (string)$this->userData['_id'],
            ];

            $query = $this->trainDoneOutsideModel->query($where);
            if(!empty($query) || empty($data[5])){
                continue;
            }

            $trainWhere = [
                'school_name' => $data[5],
                'user_id' => (string)$this->userData['_id'],
                'is_delete' => ['$ne' => 1],
            ];
            $result = $this->trainSchoolModel->queryOne($trainWhere);

            if(empty($result)){
                $trainSchool['school_name'] = $data[5];
                $trainSchool['mobile'] = (int)$data[7];
                $trainSchool['contact'] = $data[8];
                $trainSchool['user_id'] = (string)$this->userData['_id'];
                $trainSchool['ctime'] = time();
                $trainSchool['is_delete'] = 0;
                $school['_id'] = $this->trainSchoolModel->insert($trainSchool);
                $school['school_name'] = $trainSchool['school_name'];
            }else{
                $school = $result;
            }

            $pWhere = [
                'iid' => $school['_id'],
                'iname' => $school['school_name'],
                'is_delete' => ['$ne' => 1],
                'project_name' => $data[2],
            ];

            $pData = $this->projectModel->queryOne($pWhere);

            if(empty($pData)){
                $pData = [];
                $pData = [
                    'iid' => $school['_id'],
                    'iname' => $school['school_name'],
                    'project_name' => empty($data[2]) ? "锻炼": $data[2],
                    'ctime' => time(),
                ];
                $pId = $this->projectModel->insert($pData);
            }else{
                $pId = $pData['_id'];
            }

            $mPWhere = [
                'uid' => (string)$this->userData['_id'],
                'iid' => $school['_id'],
                'pid' => $pId,
            ];

            $mPData = $this->mProjectMoel->queryOne($mPWhere);
            if(empty($mPData)){
                $pMData = [
                    'uid' => (string)$this->userData['_id'],
                    'iid' => $school['_id'],
                    'iname' => $school['school_name'],
                    'pid' => $pId,
                    'pname' => empty($data[2]) ? "锻炼": $data[2],
                    'ctime' => time(),
                ];
                $this->mProjectMoel->insert($pMData);
            }

            $doneOutside['htype'] = 4;
            $doneOutside['userid'] = (string)$this->userData['_id'];
            $doneOutside['starttime'] = (int)strtotime($this->startTime . '08:00:00');
            $doneOutside['endtime'] = (int)strtotime($this->startTime . '09:00:00');
            $doneOutside['createtime'] = $doneOutside['endtime'];
            $doneOutside['homeworkid'] = $workId;
            $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];
            $doneOutside['burncalories'] = mt_rand(90,110);
            $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1c2b1dv9f1u2itc3mh61ecq6uid.jpg"];
            $doneOutside['commenttext'] = '兴趣班';
            $doneOutside['status'] = 0;
            $doneOutside['train_name'] = $data[2];
            if(!empty($school['school_name'])){
                $doneOutside['train_school_id'] = $school['_id'];   
                $doneOutside['train_school_name'] = $school['school_name']; 
            }else{
                $doneOutside['train_school_id'] = "5a4b5796e384ca457cbeb924";   
                $doneOutside['train_school_name'] = "打卡活动"; 
            }  
              
            $result = $this->trainDoneOutsideModel->insert($doneOutside);
            //写入缓存 后期加入消息队列
            $monthDate = date('Y_m', $doneOutside['endtime']);
            $this->AddCache((string)$this->userData['_id'], $monthDate, $result, $doneOutside);

        }
            return ;
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
            $fields = ['htype','starttime','endtime','burncalories','originaltime','exciseimg','homeworkid','train_name','projecttime'];
            $resList = [];
            $this->trainDoneOutsideModel->getListByMonth($hMap, $fields, $options, $monthDate, $resList);
        }
        else{
            $pInterval = 3600;
            if(empty($pInterval)) $pInterval = ($data['endtime'] - $data['starttime']);
            if(empty($data['train_name'])){
                $data['train_name'] = '课外活动';
            }
            $cacheData = [
                "trainId" => $trainId,
                "pName" => $data['train_name'],
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
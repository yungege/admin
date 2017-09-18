<?php
class Service_Upload_IOutSportModel extends BasePageService {

	protected $trainSchoolModel;
	protected $trainOutModel; 
	protected $userModel;
    protected $trainDone
	protected $resData = [];

	public function __construct(){

		$this->trainSchoolModel = Dao_SchoolInfoTrainingModel::getInstance();
		$this->trainOutModel = Dao_TrainingHomeworkModel::getInstance();
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

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

    		$userWhere = [
    			'username' => $data[0],
    			'classinfo.classname' => $data[1],
    		];

    		$options['projection'] = ['_id' => 1];

    		$userData = $this->userModel->queryOne($userWhere,$options);

    		$start_time = intval(($data[3] - 25569) * 3600 * 24);
    		$start_time = gmdate('Y-m-d H:i:s', $start_time);
    		$end_time = intval(($data[4] - 25569) * 3600 * 24);
    		$end_time = gmdate('Y-m-d H:i:s', $end_time);
    		$workData['train_name'] = $data[2];
    		$workData['start_time'] = strtotime($start_time);
    		$workData['end_time'] = strtotime($end_time);
    		$workData['week_done_no'] = (int)$data[5];
    		$workData['userid'] = $userData['_id'];
    		$workId = $this->trainOutModel->insert($workData);

    		$trainSchool['homework_id'] = $workId;
    		$trainSchool['school_name'] = $data[6];
    		$trainSchool['mobile'] = (int)$data[7];
    		$this->trainSchoolModel->insert($trainSchool);

    	}
       
        return ;

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
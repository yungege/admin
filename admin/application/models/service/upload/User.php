<?php
class Service_Upload_UserModel extends BasePageService {

    protected $schoolname;
    protected $schoolid;
    protected $classname;
    protected $classid;
    protected $schoolId;
    protected $schoolInfo = [];
    protected $classInfo = [];
    // protected $classInfos = [];
    protected $userInfo = [];

    protected $classModel;
    protected $schoolModel;
    protected $userModel;

    public function __construct() {

        $this->userModel = Dao_UserModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $ext = $this->getExt($_FILES['file']['name']);
        
        if($ext != "xls" && $ext != "xlsx"){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }
 
        if(empty($req['schoolId']) && !preg_match('/\w+/',$req['schoolId'])){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $this->schoolId = $req['schoolId'];
        $schoolFields = ['name','_id'];
        $this->schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFields);

        $datas = $this->importExcel($_FILES['file']['tmp_name'],$ext);
        // var_dump($datas);
        unset($datas[1]);
        foreach($datas as $data){

            $birth = $data[6];
            var_dump($birth);
            $birth = strtotime($data[6]);
            var_dump($birth);

            exit;
        }


        // $this->userBaseData($datas);
        exit;
      
    }

    protected function getExt($fileName) {

        return strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    }

    protected function userBaseData($datas) {
        exit;

        $class = [];
        unset($datas[1]);
        $classNames = [];

        foreach($datas as $data){

            $className = $data[4] . $data[5];
            $classNames[$className] =  $className;
        }

        foreach($classNames as $className){

            preg_match_all('/(\d+)年级(\d+)班/',$className,$classData);
            $this->classInfo['is_test'] = 0;
            $this->classInfo['name'] = $className;
            $this->classInfo['schoolname'] = $this->schoolInfo['name'];
            $this->classInfo['schoolid'] = $this->schoolInfo['_id'];
            $this->classInfo['createtime'] = time();
            $this->classInfo['grade'] = (int)$classData[1][0];
            $this->classInfo['classno'] = $classData[2][0];
            $this->classInfos[$className] = $this->classInfo;     
        }

        var_dump($this->classInfos);
        exit;

        $this->userInfo['type'] = 1;
        $this->userInfo['profile'] = '好好学习，天天向上';
        $this->userInfo['createtime'] = time();
        $this->userInfo['schoolinfo']['schoolid'] = $this->schoolInfo['_id'];
        $this->userInfo['schoolinfo']['schoolname'] = $this->schoolInfo['name'];
        // $this->userInfo['admissiontime'] = 

        foreach($datas as $data){
            $this->userInfo['username'] = $data[0];
            $this->userInfo['nickname'] = $data[0];
            // $this->userInfo['classinfo']['classid'] = 
            $this->userInfo['classinfo']['classname'] = $data[4] . $data[5];
            $this->userInfo['grade'] = $this->classInfos[$this->userInfo['classinfo']['classname']]['grade'];

            $this->userInfo['birthday'] = strtotime($data[6]);

            if($data[1] == '男'){
                $this->userInfo['sex'] = 0;
            }else{
                $this->userInfo['sex'] = 1;
            }
        }
        var_dump($classNames);
        exit;

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
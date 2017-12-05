<?php
class Service_Class_IndexModel extends BasePageService {

    protected $classModel;
    protected $userModel;

    protected $resData = [];

    public function __construct(){
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare(){

    }

    protected function __execute($req){
        $req = $req['get'];

        switch ($req['type']) {
            case 'grade':
                $this->getGradeList($req);
                break;
            
            default:
                $this->getClassList($req);
                break;
        }

        return $this->resData;
    }

    protected function getClassList($req){
        $where = [
            'is_test' => 0,
            'branch_school' => null,
        ];

        if(isset($req['schoolId']) && preg_match("/\w+/", $req['schoolId'])){
            $where['schoolid'] = addslashes($req['schoolId']);
        }

        if(isset(Dao_UserModel::$grade[(int)$req['grade']])){
            $where['grade'] = (int)$req['grade'];
        }

        if($req['stype'] == 2){
            if($_SESSION['userInfo']['type'] == 2){
                $teacher = $this->userModel->queryOne(['_id' => $_SESSION['userInfo']['_id']],['protection' => ['manageclassinfo' => 1]]);
                $classIds = array_column($teacher['manageclassinfo'],'classid');
                $where['_id'] = ['$in' =>  $classIds];
            }

            // var_dump($teacher);
            // exit;
        }

        $options = [
            'limit' => 0,
            'projection' => [
                'name' => 1,
                'classno' => 1,
            ],
        ];

        $list = $this->classModel->query($where, $options);

        if(!empty($list)){
            $list = Tools::multiArraySort($list , 'classno', SORT_ASC);
        }

        $this->resData['classList'] = $list;
    }

    protected function getGradeList($req){
        $where = [
            'grade' => [
                '$lte' => 16,
            ],
        ];

        if(isset($req['schoolId']) && preg_match("/\w+/", $req['schoolId'])){
            $where['schoolid'] = addslashes($req['schoolId']);
        }

        $list = $this->classModel->getGradeList($where);

        if(!empty($list)){
            foreach ($list as &$row) {
                $row['name'] = Dao_UserModel::$grade[$row['_id']];
            }
        }

        $this->resData['gradeList'] = $list;
    }

}
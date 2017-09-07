<?php
class Service_Class_IndexModel extends BasePageService {

    protected $classModel;

    protected $resData = [];

    public function __construct(){
        $this->classModel = Dao_ClassinfoModel::getInstance();
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
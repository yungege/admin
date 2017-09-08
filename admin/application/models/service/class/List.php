<?php
class Service_Class_ListModel extends BasePageService {

    protected $schoolId;
    protected $gradeNo;
    protected $classList;
    protected $classModel;
    protected $resData = [];

    public function __construct() {

        $this->classModel = Dao_ClassinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $this->schoolId = $req['schoolId'];
        $this->gradeNo = (int)$req['gradeNo'];
        $classWhere = [
            'schoolid' => $this->schoolId,
            'grade' => $this->gradeNo,
        ];

        $options['projection'] = [
            'name' => 1,'_id' => 1,
        ];

        $this->classList = $this->classModel->query($classWhere,$options);
        $this->resData['classList'] = $this->classList;
       
        return $this->resData;
    }

}
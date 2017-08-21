<?php
class Service_Project_AddHomeworkModel extends BasePageService {


    protected $schoolId;
    protected $projectId;

    protected $schoolModel;
    protected $projectModel;


    public function __construct() {

        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        
        $req = $req['get'];
        $this->schoolId = $req['schoolId'];
        $this->projectId = $req['projectId'];
        $schoolWhere = [
            '_id' => $this->schoolId,
        ];
        $schoolFields = [
            'name','_id'
        ];
        $schoolInfo = $this->schoolModel->getListByPage($schoolWhere,$schoolFields)[0];
        $resData['schoolName'] = $schoolInfo['name'];
        $resData['schoolId'] = $schoolInfo['_id'];

        $projectFileds = [
            'name',
        ];
        if(!empty($this->projectId)){
            $projectInfo = $this->projectModel->getProjectBaseInfoById($this->projectId,$projectFileds);
        }
        $resData['projectId'] = $req['projectId'];
        $resData['projectName'] = $projectInfo['name'];

        return $resData;
        // var_dump($schoolInfo);
        // exit;
    }
    
}
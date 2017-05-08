<?php
class Service_Sport_ActionDelModel extends BasePageService {

    protected $actionModel;

    public function __construct() {
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $id = $req['post']['id'];
        if(empty($id) || !preg_match("/\w+/", $id)){
            $this->errNo = -1;
            return;
        }

        $res = $this->actionModel->updateById($id, ['status' => -9]);
        if(false === $res){
            $this->errNo = -1;
        }
    }

}
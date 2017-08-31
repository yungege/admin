<?php
class Service_Sport_UpdateDeadlineTimeModel extends BasePageService {

    protected $homeworkModel;

    protected $reqData;
    protected $resData;

    public function __construct() {
        $this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];
        if(
            !preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['deadline_time']) ||
            !isset($req['hid']) ||
            !preg_match("/\w+/", $req['hid']) ||
            strtotime($req['deadline_time'].' 23:59:59') <= time()
        ){
            throw new Exception("参数错误", -1);
        }

        $info = $this->homeworkModel->getInfoById((string)$req['hid'], ['name','deadline_time']);
        if(empty($info) || $info['deadline_time'] <= time()){
            throw new Exception("作业已过期或不存在", -1);
        }

        $updateData = [
            'deadline_time' => (int)strtotime($req['deadline_time'].' 23:59:59'),
        ];
        $res = $this->homeworkModel->updateById($info['_id'], $updateData);
        if($res === false){
            throw new Exception("修改失败", -1);
        }

        return;
    }

}
<?php
class Service_Project_PublishHomeworkModel extends BasePageService {

	protected $homeworkModel;

	public function __construct(){

		$this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
	}

	public function __declare(){
		
	}

	public function __execute($req){

		$req = $req['post'];
		if(empty($req['schoolId']) || empty($req['projectId']) || empty($req['startTime']) || empty($req['endTime']) || empty($req['classIds']) || empty($req['homeworkName']) || empty($req['weekDoneNo']) || empty($req['homeworkType'])){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$data['class_info'] = explode('|',$req['classIds']);
		$data['start_time'] = strtotime($req['startTime']);
		$data['deadline_time'] = strtotime($req['endTime']);
		$data['type'] = (int)$req['homeworkType'];		
		$data['school_info'] = $req['schoolId'];
		$data['coverimg'] = "";
		$data['exertime'] = [1,2,3,4,5,6,7];
		$data['name'] = $req['homeworkName'];
		$data['describe'] = $req['homeworkDescribe'];
		$data['gender'] = 2;
		$data['project_id'][0] = $req['projectId'];
		$data['create_time'] = time();	
		$data['weekdoneno'] = $req['weekDoneNo'];
		$data['makeup_limit'] = (int)$req['makeupLimit'] * 60 * 60;
		$data['homework_require'] = $req['homeworkRequire'];
		$data['makeup_interval'] = (int)$req['makeupInterval'];
		$data['creator_info'] = [];

		if(!preg_match('/^\d{0,2}$/',$req['makeupLimit']) || !preg_match('/^\d{0,2}$/',$req['makeupInterval']) || $data['start_time'] > $data['deadline_time'] ){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$hWhere = [
			'start_time' => ['$lte' => $data['deadline_time']],
			'deadline_time' => ['$gte' => $data['start_time']],
			'class_info' => ['$in' => $data['class_info']],
			'type' => $data['type'],
		];
		$options['projection'] = ['_id'];
		$homeworkInfos = $this->homeworkModel->queryOne($hWhere,$options);

		if(!empty($homeworkInfos)){
			return $this->errNo = HOMEWORK_HAS_BEEN;
		}
		$result = $this->homeworkModel->insert($data);

        if($result === false){
            return $this->errNo = PROJECT_ADD_FAILED;
        }
        
        return;

	}

}
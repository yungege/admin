<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

        $schoolOutModel = Dao_SchoolInfoTrainingModel::getInstance();
        $userModel = Dao_UserModel::getInstance();
        $homeworkModel = Dao_TrainingHomeworkModel::getInstance();     
        $trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $classModel = Dao_ClassinfoModel::getInstance();

        $kip = 0;
    	while(1){

    		$tWhere = [
                '$or' => [
                    ['train_school_id' => ['$exists' => 0]],
                    ['train_school_name' => ['$exists' => 0]],
                ],
                'htype' => 4,
    		];
    		$tOptions = [
    			'projection' => ['_id' => 1,'homeworkid' => 1],
    			// 'skip' => $skip,
    		];
    		$tData = $trainOutsideModel->queryOne($tWhere,$tOptions);

    		if(empty($tData)){
                var_dump('haha');
    			break;
    		}

    		$hWhere = [
    			'_id' => $tData['homeworkid'],
    		];
    		$hOptions = [
    			'projection' => ['_id' => 1],
    		];
    		$hData = $homeworkModel->queryOne($hWhere,$hOptions);
    		if(!empty($hData)){

    			$sWhere = [
	    			'homework_id' => $hData['_id'],
	    		];
	    		$sOptions = [
	    			'projection' => ['school_name' => 1,'_id' => 1],
	    		];
	    		$school = $schoolOutModel->queryOne($sWhere,$sOptions);
	    		if(!empty($school) && !empty($school['school_name'])){
	    			$set = [
	    				'train_school_id' => $school['_id'],
	    				'train_school_name' => $school['school_name'],
	    			];
	    		}else{
	    			$set = [
	    				'train_school_id' => "5a4b5796e384ca457cbeb924",
	    				'train_school_name' => "打卡活动"
	    			];
	    		}
    		}else{
    			$set = [
    				'train_school_id' => "5a4b5796e384ca457cbeb924",
    				'train_school_name' => "打卡活动"
    			];
    		}
// var_dump($tData['_id']);
// exit;
            if(empty($tData['_id'])){
                break;
            }
    		$result = $trainOutsideModel->updateById($tData['_id'],$set);
    		

    		$skip++;
    		// if($skip == 100){
    		// 	break;
    		// }
    		
    	}

    	var_dump(123);
    		exit;


    }





}
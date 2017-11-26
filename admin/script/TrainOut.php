<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

    	$schoolModel = Dao_SchoolInfoTrainingModel::getInstance();
    	$homeworkModel = Dao_TrainingHomeworkModel::getInstance();


    	$i = 0;
    	while(1){

    		$schoolWhere = [
    			// 'desc' => 0,
    		];
    		$schoolOption = [
    			'skip' => $i,
    			'limit' => 1,
    		];
    		$i++;

    		$schoolInfo = $schoolModel->queryOne($schoolWhere,$schoolOption);
    		
    	}

        echo "haha";
        exit;
    }

}

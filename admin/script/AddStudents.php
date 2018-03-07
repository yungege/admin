<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

        $schoolOutModel = Dao_SchoolInfoTrainingModel::getInstance();
        $userModel = Dao_UserModel::getInstance();
        $classModel = Dao_ClassinfoModel::getInstance();

        $kip = 0;
    	while(1){

    		



        }

    }

}
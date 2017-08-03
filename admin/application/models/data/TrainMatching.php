<?php
/**
* 匹配身体素质作业项目
*/

class Data_TrainMatchingModel {

    protected $uid;

    protected $userModel;
    protected $fitModel;
    protected $workModel;
    protected $proModel;
    protected $proSkuModel;
    protected $defaultLevel;
    protected $score;
    
    public function __construct(string $uid) {
        $this->uid = $uid;
        $this->userModel = Dao_UserModel::getInstance();
        $this->fitModel = Dao_PhysicalfitnesstestModel::getInstance();
        $this->proModel = Dao_ExerciseProjectModel::getInstance();
        $this->proSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
    }

    public function getMatchProject(){
        $this->getUserDefaultLevel();
        $grade = $this->getUserGrade();

        $projectList = $this->proModel->getProjectByGrade((array)$grade, ['_id','has_level']);
        if(empty($projectList)) return;

        $project = $projectList[array_rand($projectList, 1)];

        if($project['has_level'] == -1){
            $this->defaultLevel = -1;
        }

        $projectSku = $this->proSkuModel->getProjectSkuInfoByProjectIdAndDifficulty(
            $project['_id'], $this->defaultLevel);

        return $projectSku;
    }

    public function getUserTotalScore(){
        $info = (array)$this->fitModel->getPhyInfoByUserid(
            $this->uid,
            ['totalscore']
        )['totalscore'];

        if(empty($info)) return;

        $info = Tools::multiArraySort($info, 'testtime');

        if(empty($info)) return;

        $this->score = (float)$info[0]['score'];
        return $this->score;
    }

    public function getUserGrade(){
        return $this->userModel->getInfoById(
            $this->uid,
            ['grade']
        )['grade'];
    }

    public function getUserDefaultLevel(){
        $score = $this->getUserTotalScore();
        // 如果没有体测成绩默认为该同学匹配中等难度的身体素质锻炼项目
        if($score <= 0){
            $this->defaultLevel = 1;
        }
        elseif(($score < 80) && ($score > 0)){
            $this->defaultLevel = 0;
        }
        elseif(($score >= 80) && ($score < 90)){
            $this->defaultLevel = 1;
        }
        else{
            $this->defaultLevel = 2;
        }

        return $this->defaultLevel;
    }

}
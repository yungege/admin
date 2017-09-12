<?php
class Service_Ugc_MarkModel extends BasePageService {

    protected $trainingId;
    protected $trainModel;
    protected $trainData = [];
    protected $resData;

    public function __construct() {

       $this->trainModel = Dao_TrainingdoneModel::getInstance();  
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

       $req = $req['post'];
       $this->trainingId = $req['trainingId'];
       $trainWhere = [];
       $trainFields = ['mark'];

       $this->trainData = $this->trainModel->getTrainList($trainWhere,$trainFields)[0];
       $this->resData['mark'] = $this->trainData['mark'];

       return $this->resData;
    }

}
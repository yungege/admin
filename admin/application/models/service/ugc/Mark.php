<?php
class Service_Ugc_MarkModel extends BasePageService {

    protected $trainingId;
    protected $mark;
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
       $this->trainingId = $req['trainId'];
       $this->mark = $req['description'];
       
       $trainFields = ['mark' => $this->mark];
       $resutl = $this->trainModel->updataById($this->trainingId,$trainFields);

       if($result === false){

          return $this->errNo = TRAINING_MASK_FAULT;
       }

       return ;
    }

}
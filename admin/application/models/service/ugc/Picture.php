<?php
class Service_Ugc_PictureModel extends BasePageService {

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
       $trainFields = ['exciseimg'];
       $this->trainData = $this->trainModel->getTrainById($this->trainingId,$trainFields);
      
       if($this->trainData === false){

          return $this->errNo = TRAINING_MASK_FAULT;
       }

       return $this->trainData;
    }

}
<?php
class Service_School_SearchModel extends BasePageService {

    protected $schoolModel;

    public function __construct(){
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare(){

    }

    protected function __execute($req){
        $name = $req['get']['name'];
        $this->checkXss($name);
        if(empty($name)) return [];

        $where = [
            'name' => ['$regex' => addslashes($name), '$options' => 'i'],
        ];

        $options = [
            'limit' => 20,
            'projection' => ['name'=>1],
        ];
        
        $list = $this->schoolModel->query($where,$options);
        return ['list' => $list];
    }

}
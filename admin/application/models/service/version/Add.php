<?php
class Service_Version_AddModel extends BasePageService {


    protected $versionModel;

    public function __construct() {
        $this->versionModel = Dao_VersionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];

        $option = [
            'projection' => [
                'versionno' => 1,
            ],
            'sort' => [
                'versionno' => -1,
            ],
        ];
        $ios = $this->versionModel->queryOne(['type' => 0], $option);
        $and = $this->versionModel->queryOne(['type' => 1], $option);
        
        return [
            'pageTag' => '6-2',
            'ios' => $ios['versionno'],
            'android' => $and['versionno'],
        ];
    }

    
}
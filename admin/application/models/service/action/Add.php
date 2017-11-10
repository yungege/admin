<?php
class Service_Action_AddModel extends BasePageService {


    protected $actionModel;
    protected $categoryModel;

    protected $resData = [
        'pageTag' => '3-3',
    ];

    public function __construct() {
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
        $this->categoryModel = Dao_ActionsCategoryModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];
        $this->resData['uptoken'] = getUploadToken();

        $this->resData['category'] = $this->categoryModel->query(['status' => 1],[
            'limit' => 0,
            'projection' => [
                '_id' => 1,
                'category_name' => 1,
            ],
        ]);

        return $this->resData;
    }

    
}
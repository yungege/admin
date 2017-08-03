<?php
class Service_Sport_HomeworkModel extends BasePageService {

    const PAGESIZE = 15;

    protected $homeworkModel;
    protected $projectModel;
    protected $schoolModel;
    protected $classModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-1',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public function __construct() {
        $this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['deadline_time' => -1];

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];

        $count = $this->homeworkModel->count();
        // echo $count;exit;
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count == 0)
            return $this->resData;

        $list = $this->homeworkModel->getListByPage([], [], $options);
        if(empty($list))
            return $this->resData;

        foreach ($list as &$row) {
            $pwhere = [
                '_id' => [
                    '$in' => $row['project_id'],
                ]
            ];
            $row['school'] = $this->schoolModel->getInfoById($row['school_info'], ['name'])['name'];
            $pro = $this->projectModel->query($pwhere, ['limit' => 0,'projection'=>['name'=>1,'coverimg'=>1]]);
            $pro = array_column($pro, null, '_id');
            $row['project'] = [];
            array_map(function($v) use (&$row, $pro){
                if(!empty($pro[$v]['coverimg'])){
                    $pro[$v]['coverimg'] .= '?imageView2/2/w/100/h/60/q/100';
                }
                
                $row['project'][] = $pro[$v];
            }, $row['project_id']);

            if($row['deadline_time'] <= time()){
                $row['status'] = -1;
            }
            else if($row['deadline_time'] > time() && $row['start_time'] <= time()){
                $row['status'] = 1;
            }
            else{
                $row['status'] = 2;
            }

            // $row['exertime'] = implode('、', $row['exertime']);
        }
        
        $this->resData['list'] = $list;
        return $this->resData;
    }

}
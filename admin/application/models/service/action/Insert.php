<?php
class Service_Action_InsertModel extends BasePageService {


    protected $actionModel;

    public static $img = [
        'jpg','png','jpeg',
    ];

    public static $mp4 = [
        'mp4',
    ];

    protected $resData = [
        
    ];

    public function __construct() {
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req);
        $req = $req['post'];

        if(false === $this->checkParams($req))
            return false;
        
        $res = $this->actionModel->insert($req);
        if($res === false){
            return $this->errNo = ACTION_ADD_FAILED;
        }
        
        return;
    }

    protected function checkParams(&$req){
        $urlPreg = "/(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$/";
        
        if(
            (empty($req['name']) || mb_strlen($req['name']) > 12) ||
            (!isset(Dao_ExerciseactionModel::$type[$req['typeno']])) ||
            (!isset(Dao_ExerciseactionModel::$sex[$req['sex']])) ||
            (!is_numeric($req['actiongroupno']) || $req['actiongroupno'] < 0) ||
            (!is_numeric($req['singletime']) || $req['singletime'] < 0) ||
            (!is_numeric($req['calorie']) || $req['calorie'] < 0) ||
            (!preg_match($urlPreg, $req['coverimg'])) || 
            (!preg_match($urlPreg, $req['video'])) ||
            (!preg_match("/[0-9a-z]{24}/", $req['physicalquality']))
        ){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $imgType = pathinfo($req['coverimg'], PATHINFO_EXTENSION);
        $mp4Type = pathinfo($req['video'], PATHINFO_EXTENSION);

        if(!in_array($imgType, self::$img) || !in_array($mp4Type, self::$mp4)){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        if(($req['typeno'] != 4) && empty($req['vfilesize'])){
            $this->errNo = ACTION_VIDEO_SIZE_ERROR;
            return false;
        }
        else{
            $req['vfilesize'] = number_format(($req['vfilesize']/1024/1024), 2, '.', '');
        }

        if(!preg_match("/[0-9a-z]{24}/", subject)){

        }

        // if(
        //     isset($req['physicalquality']) && 
        //     isset(Dao_ExerciseactionModel::$physicalquality[$req['physicalquality']])
        // ){
        //     $req['physicalquality'] = (int)$req['physicalquality'];
        // }
        // else{
        //     $req['physicalquality'] = null;
        // }

        $req = [
            'name'       => $req['name'],
            'typeno'     => (int)$req['typeno'],
            'sex'        => (int)$req['sex'],
            'actiongroupno' => (int)$req['actiongroupno'],
            'singletime' => (int)$req['singletime'],
            'calorie'    => (float)$req['calorie'],
            'coverimg'   => $req['coverimg'],
            'video'      => $req['video'],
            'vfilesize'  => (float)$req['vfilesize'],
            // 'physicalquality' => $req['physicalquality'],
            'category_id'   => (string)$req['physicalquality'],
            'createtime'  => time(),
        ];
    }
    
}
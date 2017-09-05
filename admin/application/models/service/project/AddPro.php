<?php
class Service_Project_AddProModel extends BasePageService {


    protected $projectModel;

    public static $img = [
        'jpg','png','jpeg',
    ];

    protected $resData = [
        
    ];

    public function __construct() {
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req);
        $req = $req['post'];

        if(false === $this->checkParams($req, $newReq))
            return false;
        
        $res = $this->projectModel->insert($newReq);
        if($res === false){
            return $this->errNo = PROJECT_ADD_FAILED;
        }
        
        return ['id' => $res];
    }

    protected function checkParams($req, &$newReq){
        $urlPreg = "/(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$/";
        
        if(
            (empty($req['gids'])) ||
            (empty($req['name']) || mb_strlen($req['name']) > 16) ||
            (!isset(Dao_ExerciseactionModel::$sex[$req['gender']])) ||
            (!preg_match($urlPreg, $req['coverimg'])) ||
            (!in_array($req['has_level'], [1,-1]))
        ){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        // 年级验证
        $gradesReq =  explode('|', $req['gids']);
        $grades = array_keys(Dao_UserModel::$grade);
        $filterGrades = [];
        array_map(function(&$v) use ($grades,&$filterGrades) {
            if(in_array($v, $grades)){
                $filterGrades[] = (int)$v;
            }
        }, $gradesReq);
        if(array_diff($gradesReq, $filterGrades) || array_diff($filterGrades,$gradesReq)){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }
        $req['grade_apply'] = $filterGrades;

        $imgType = pathinfo($req['coverimg'], PATHINFO_EXTENSION);
        if(!in_array($imgType, self::$img)){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $newReq = [
            'name'        => $req['name'],
            'exer_type'   => 2,
            'coverimg'    => $req['coverimg'],
            'desc'        => $req['desc'],
            'gender'      => (int)$req['gender'],
            'has_level'   => (int)$req['has_level'],
            'grade_apply' => $req['grade_apply'],
            'ctime'       => time(),
        ];
    }
    
}
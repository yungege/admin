<?php
class Service_Version_PublishModel extends BasePageService {

    protected $versionModel;

    public function __construct() {
        $this->versionModel = Dao_VersionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];
        $urlPreg = "/(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$/";

        if(
            ($req['type'] != 0 && $req['type'] != 1) || 
            empty($req['versionno']) || 
            empty($req['version']) || 
            empty($req['description']) || 
            (!empty($req['downloadurl']) && !preg_match($urlPreg, $req['downloadurl']))
        ){
            return $this->errNo = -1;
        }

        $option = [
            'projection' => [
                'versionno' => 1,
            ],
            'sort' => [
                'versionno' => -1,
            ],
        ];

        $ver = $this->versionModel->queryOne(['type' => (int)$type], $option)['versionno'];
        if($ver >= $req['versionno']){
            return $this->errNo = -1;
        }

        $insert = [
            'type' => (int)$req['type'],
            'version' => (string)$req['version'],
            'versionno' => (string)$req['versionno'],
            'description' => $req['description'],
            'downloadurl' => $req['downloadurl'],
            'createtime' => time(),
        ];

        $res = $this->versionModel->insert($insert);
        if($res === false)
            $this->errNo = -1;
        
        return;
    }

    
}
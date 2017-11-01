<?php
class Service_Meau_AddUriModel extends BasePageService {

    protected $urlModel;

    public function __construct() {
        $this->urlModel = Dao_UrlModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $this->checkXss($req['post']);
        $req = $req['post'];
        if(
            !preg_match("/^\/(\w+)(\/\w+){0,}/", $req['url']) || 
            empty($req['remark'])
        ){
            throw new Exception("非法参数", -1);
        }

        $hasExists = $this->urlModel->checkUrlExists($req['url']);
        if(false === $hasExists){
            $data = [
                'url' => $req['url'],
                'remark' => mb_substr($req['remark'], 0, 20),
            ];

            $res = $this->urlModel->insert($data);
            if(false === $res){
                throw new Exception("URI创建失败", -1);
            }
            return;
        }
        else{
            throw new Exception("URI已存在", -1);
        }

    }

}
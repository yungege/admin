<?php
class Service_Meau_AddFirstModel extends BasePageService {

    protected $meauModel;
    protected $userModel;
    protected $treeModel;
    protected $urlModel;

    protected $reqData;
    protected $resData;

    public function __construct() {
        $this->meauModel = Dao_MeauModel::getInstance();
        $this->urlModel = Dao_UrlModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $type = $req['get']['type'];
        $req = $req['post'];
        $this->checkXss($req);

        if(empty($req['name']) || mb_strlen($req['name']) > 10){
            throw new Exception("菜单名称必须在10个字以内", -1);
        }

        if((int)$req['sort'] <= 0){
            throw new Exception("排序必须是大于0的正整数", -1);
        }

        if(isset($type) && ($type == 2 || $type == 3)){
            if($type == 2){
                // 子菜单
                if(!preg_match("/[0-9a-z]{24}/", $req['pid'])){
                    throw new Exception("父菜单错误.请刷新再试", -1);
                }
                $pinfo = $this->meauModel->getInfoById($req['pid'], ['status']);
                if(empty($pinfo) || $pinfo['status'] != 1){
                    throw new Exception("父菜单错误.请刷新再试", -1);
                }
            }
            else{
                if(!preg_match("/[0-9a-z]{24}/", $req['id'])){
                    throw new Exception("父菜单错误.请刷新再试", -1);
                }
                $pinfo = $this->meauModel->getInfoById($req['id'], ['status']);
                if(empty($pinfo) || $pinfo['status'] != 1){
                    throw new Exception("菜单信息错误.请刷新再试", -1);
                }
            }

            if($type == 2 || ($type == 3 && isset($req['url']))){
                if(!preg_match("/^\/(.*)/", $req['url'])){
                    throw new Exception("URL错误", -1);
                }
            }

            if($type == 3 && isset($req['icon_style'])){
                if(!preg_match("/\w+/", $req['icon_style'])){
                    throw new Exception("请输入css样式名称，空格间隔", -1);
                }
            }
            
            $insertData = [
                "pid"        => $req['pid'],
                "name"       => $req['name'],
                "url"        => $req['url'],
                "sort"       => (int)$req['sort']
            ];
        }
        else{
            // 父菜单
            if(!preg_match("/\w+/", $req['icon_style'])){
                throw new Exception("请输入css样式名称，空格间隔", -1);
            }
            
            $insertData = [
                "name"       => $req['name'],
                "icon_style" => $req['icon_style'],
                "sort"       => (int)$req['sort']
            ];
        }

        if($type == 3){
            // 编辑
            $updateData = [
                'name' => $req['name'],
                'sort' => (int)$req['sort'],
            ];
            if(isset($req['icon_style'])){
                $updateData['icon_style'] = $req['icon_style'];
            }
            if(isset($req['url'])){
                $updateData['url'] = $req['url'];
            }
            $oldUrlInfo = $this->meauModel->getInfoById($req['id'], ['url']);
            try{
                $res = $this->meauModel->updateById($req['id'], $updateData);
            }
            catch(Exception $e){
                $res = false;
            }
            
            if(false === $res){
                throw new Exception("操作失败", -1);
            }

            if(isset($req['url']) && ($oldUrlInfo['url'] != $updateData['url'])){
                $this->urlModel->update(
                    ['url' => $oldUrlInfo['url']],
                    ['url' => $req['url'],'remark' => $req['name']]
                );
            }
        }
        else{
            $res = $this->meauModel->insert($insertData);
            if(false === $res){
                throw new Exception("操作失败", -1);
            }

            if($type == 2){
                $this->urlModel->insert([
                    'url' => $insertData['url'],
                    'remark' => $req['name']
                ]);
            }
            
        }
        
        return;
    }

}
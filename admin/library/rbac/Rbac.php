<?php

/**
 * 鉴权类
 * @Author    422909231@qq.com
 * @DateTime  2017-10-31
 * @copyright [copyright]
 */

class Rbac_Rbac
{
    private $uid;
    private $role;
    private static $url;
    private static $meau;
    private $uri;

    protected $roleAssginModel;
    protected $roleModel;
    protected $meauModel;
    // protected $urlModel;
    protected $urlAssginModel; 
    
    public function __construct(){
        if(empty($_SESSION['userInfo'])){
            throw new Exception("", USER_NEED_LOGIN);
        }

        $this->roleAssginModel = Dao_RoleAssginModel::getInstance();
        $this->roleModel = Dao_RoleModel::getInstance();
        $this->meauModel = Dao_MeauModel::getInstance();
        $this->urlAssginModel = Dao_UrlToRoleModel::getInstance();
        // $this->urlModel = Dao_UrlModel::getInstance();

        $this->uid = $_SESSION['userInfo']['_id'];
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function getMyRole(){
        $assginInfo = $this->roleAssginModel->getRoleByUId($this->uid);
        if(empty($assginInfo)){
            return;
        }
        $this->role = $this->roleModel->getInfoById($assginInfo[0]['rid']);
        $_SESSION['myRole'] = &$this->role;
    }

    public function getMyUrl(){
        if(empty($this->role)){
            $this->getMyRole();
        }

        if(empty($this->role)){
            return;
        }

        self::$url = $this->urlAssginModel->getInfoByRoleId($this->role['_id']);
        $_SESSION['myUrl'] = &self::$url;
    }

    public function getMyMeau(){
        $meauList = $this->meauModel->listMeau();
        if(empty($meauList)) return;

        if(empty(self::$url)){
            $this->getMyUrl();
        }

        if(empty(self::$url)){
            return;
        }

        foreach ($meauList as $key => $row) {
            if($row['url'] != '#'){
                if(!in_array($row['url'], self::$url['url'])){
                    unset($meauList[$key]);
                }
            }
        }

        $treeModel = new Tree($meauList);
        $meauList = $treeModel->getTreeArray();

        foreach ($meauList as $key => $row) {
            if(empty($row['_child'])){
                unset($meauList[$key]);
            }
        }

        $_SESSION['myMeau'] = self::$meau = &$meauList;
    }

    public function authUrl(){
        // if(
        //     empty($this->uri) || 
        //     $this->uri == '/' || 
        //     $this->uri == '/index.html' ||
        //     $this->uri == '/user/dologin'
        // ){
        //     return true;
        // }

        if(empty($_SESSION['myUrl']['url'])){
            return false;
        }

        return in_array($this->uri, $_SESSION['myUrl']['url']);
    }

    public function getCurrentMeauPid(){
        return $this->meauModel->queryOne(
            ['url' => $this->uri,'pid' => ['$nin' => ['#','']]],
            ['projection' => [
                'pid' => 1
            ]]
        )['pid'];
    }

    public function __get($key){
        return $this->$key;
    }
}
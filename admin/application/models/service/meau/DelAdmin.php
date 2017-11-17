<?php
class Service_Meau_DelAdminModel extends BasePageService {

	protected $adminModel;
	protected $roleAssginModel;


    public function __construct() {
       $this->adminModel = Dao_BackendAdminModel::getInstance();
       $this->roleAssginModel = Dao_RoleAssginModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        
    	$req = $req['post'];
    	$userid = $req['userid'];

    	if(empty($userid) || !preg_match("/\w+/",$userid)){
    		$this->errNo = -1;
    		return ;
    	}

    	$res = $this->adminModel->delete(['userid' => $userid]);
    	if(false === $res){
            $this->errNo = -1;
        }

        $res = $this->roleAssginModel->delete(['uid'=> $userid]);
        if(false === $res){
        	$this->errNo = -1;
        }

    	return ;
    }

}
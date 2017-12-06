<?php
class Service_Meau_AddAdminModel extends BasePageService {

	protected $adminModel;
	protected $userModel;
	protected $roleAssginModel;
	protected $roleModel;

  public function __construct() {
  	$this->adminModel = Dao_BackendAdminModel::getInstance();
  	$this->userModel = Dao_UserModel::getInstance();
  	$this->roleAssginModel = Dao_RoleAssginModel::getInstance();
  	$this->roleModel = Dao_RoleModel::getInstance();
  }

  protected function __declare() {
      
  }

  protected function __execute($req) {
      
    $req = $req['post'];
    if(!preg_match('/^1[0-9]{10}$/',$req['mobileno']) ||
    	empty($req['userid']) ||
    	empty($req['passwd']) ||
    	empty($req['role']) 
  	){
  		$this->errCode = -1;
  		return ;
    }
    $req['userid'] = trim($req['userid']);
    $req['passwd'] = trim($req['passwd']);

    $roleWhere = [
    	'_id' => $req['role'],
    ];
    $roleData = $this->roleModel->queryOne($roleWhere);
    if(empty($roleData)){
    	$this->errCode = -1;
		  return ;
    }

   	$userWhere = [
   		'_id' => $req['userid'],
      'mobileno' => (int)$req['mobileno'],
   	];
   	$userSet['password'] = md5(substr($req['mobileno'], 1,8) . $req['passwd']);
    $result = $this->userModel->update($userWhere,$userSet);
   	$roleData = [
   		'uid' => $req['userid'],
   		'rid' => $req['role'],
   	];
   	$result = $this->roleAssginModel->insert($roleData);

   	if($result == false){
   		$this->errCode = -1;
		  return ;
   	}

   	$adminData = [
   		'userid' => $req['userid'],
   		'mobileno' => (int)$req['mobileno'],
   	];
   	$result = $this->adminModel->insert($adminData);
   	if($result == false){
   		$this->errCode = -1;
		  return ;
   	}

    return ;
  }

}
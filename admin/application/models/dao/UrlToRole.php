<?php
class Dao_UrlToRoleModel extends Db_Mongodb {
    
    protected $table = 'backend_url_role';

    protected $fields = [
        'rid'      => '', // role id
        'url'      => '', // url json
    ];

    protected function __construct(){
        parent::__construct();
    }

    /**
     * 获得实例
     * @param string $confkey
     * @return mongodb
     */
    public static function getInstance() {

        if(!self::$instance instanceof self){
            self::$instance = new self();
        }

        return self::$instance;
    }

    // 分配url
    public function assginUrl(string $roleId, array $data){
        $where = [
            'rid' => $roleId,
        ];

        if(!is_string($data['url'])){
            $data['url'] = json_encode($data['url']);
        }

        $hasExists = $this->query($where, ['projection'=>['_id'=>1],'limit'=>1])[0];
        if(!empty($hasExists)){
            return $this->update($where, $data);
        }
        else{
            return $this->insert($data);
        } 
        
    }

    // 获取url
    public function getInfoByRoleId(string $roleId){
        $where = [
            'rid' => $roleId,
        ];

        $assginUrl = $this->queryOne($where);
        if(!empty($assginUrl)){
            $assginUrl['url'] = json_decode($assginUrl['url'], true);
            if(is_array($assginUrl['url']) && !empty($assginUrl['url'])){
                return $assginUrl;
            }
        }

        return [];
    }

}
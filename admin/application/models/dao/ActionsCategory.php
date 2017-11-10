<?php
class Dao_ActionsCategoryModel extends Db_Mongodb {

	protected $table = 'actions_category';

	protected $fields = [
		'pid'                   => '',  // 父ID
		'category_name'         => '',  // 名称
		'author_id'             => '',  // 创建者ID
		'status'                => 1,   // 文章封面
		'ctime'                 => 0,   // 创建时间
	];

	protected function __construct(){
		parent::__construct();
	}

	/**
	 * 获取实例
	 * @param string $confkey
	 * @return mongodb
	*/
	public static function getInstance() {

		if(!self::$instance instanceof self){
			self::$instance = new self();
		}
		
		return self::$instance;
	}

	public function getActionsTypeList(array $where = [],array $options = []){
		
		return $this->query($where,$options);
	}
}
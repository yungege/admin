<?php
class Dao_TrainScheduleModel extends Db_Mongodb {

	protected $table = 'train_schedule';

	protected $fields = [
		'user_id'                   => '',  // 用户ID
		'train_school_id'           => '',  // 锻炼学校ID
		'train_school_name'         => '',  // 锻炼学校名字
		'done_date'                 => [],  // 锻炼日期 [星期1 , 星期2 .....]
		'train_name'                => '',  // 锻炼项目
		'ctime'                     => 0,   // 创建时间
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

}
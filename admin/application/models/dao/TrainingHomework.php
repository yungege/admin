<?php
class Dao_TrainingHomeworkModel extends Db_Mongodb {
	
	protected $table = 'training_homework';

	protected $fields = [

		'train_name' => '',                  //锻炼名字
		'start_time' => '',                  //开始时间
		'end_time' => '',                    //结束时间
		'week_done_no' => 0,                 //周锻炼次数
		'userid' => '',                      //用户ID
	];

	protected function __construct(){

		parent::__construct();
	}

	/**
	* 获取实例
	* @param string $confKey
	* @return mongodb
	*/
	public static function getInstance(){

		if(!self::$instance instanceof self){
			self::$instance = new self();
		}

		return self::$instance;
	}

}
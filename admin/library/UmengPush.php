<?php
/**
* 友盟推送
*/

class UmengPush {

	const iosAppKey = "582ed0a0677baa081c000ab2";
	const androidAppKey = "57e4e7fde0f55aa8a60008ef";
	const uMengUrl =  "http://msg.umeng.com/api/send";
	const iosAppMasterSecret = "lsnn5qf9pjggson7uxuvfyhnkaagxlmv";
	const androidAppMasterSecret = "1qpeclzvoca6ufo0m62hanejhqrfl2ca";
	const httpMethod = 'POST';

	protected $postData = [];

	public function sendPushByIos($data){

		$post_body = json_encode($data);
		// 请求方法
		$http_method = self::httpMethod;
		// 请求url信息
		$url = self::uMengUrl;
		$app_master_secret = self::iosAppMasterSecret;
		// 生成自己的签名
		$mysign = MD5($http_method.$url.$post_body.$app_master_secret);
		// 友盟推送调用地址
		$url = "http://msg.umeng.com/api/send?sign=$mysign";
		// 初始化cURL
		$ch = curl_init();
		// 设置访问的url地址
		curl_setopt($ch,CURLOPT_URL,$url);
		// 如果成功返回结果,如果失败返回false
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		// POST形式传输数据
		curl_setopt($ch,CURLOPT_POST,1);
		// 设置POST传输的数据
		curl_setopt($ch,CURLOPT_POSTFIELDS,$post_body);
		// 运行当前的cURL句柄
	    $output = curl_exec($ch);
	    // 关闭cURL会话
	    curl_close($ch);
	 
	    return $output;
	}

	public function sendPushByAndroid($data){

		$post_body = json_encode($data);
		// 请求方法
		$http_method = self::httpMethod;
		// 请求url信息
		$url = self::uMengUrl;
		$app_master_secret = self::androidAppMasterSecret;
		// 生成自己的签名
		$mysign = MD5($http_method.$url.$post_body.$app_master_secret);
		// 友盟推送调用地址
		$url = "http://msg.umeng.com/api/send?sign=$mysign";
		// 初始化cURL
		$ch = curl_init();
		// 设置访问的url地址
		curl_setopt($ch,CURLOPT_URL,$url);
		// 如果成功返回结果,如果失败返回false
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		// POST形式传输数据
		curl_setopt($ch,CURLOPT_POST,1);
		// 设置POST传输的数据
		curl_setopt($ch,CURLOPT_POSTFIELDS,$post_body);
		// 运行当前的cURL句柄
	    $output = curl_exec($ch);
	    curl_close($ch);   
	  
	    return $output;
	}

	// Listcast
	public function iosPushByListcast($title, $content, $deviceToken, array $extFields=[]){

		$this->postData['ios']['appkey'] = self::iosAppKey;
		$this->postData['ios']['timestamp'] = time();
		$this->postData['ios']['type'] = 'listcast';
		$this->postData['ios']['device_tokens'] = $deviceToken;
		$this->postData['ios']['payload']['aps']['alert']['title'] = $title;
		$this->postData['ios']['payload']['aps']['alert']['body'] = $content;
		$this->postData['ios']['payload']['aps']['badge'] = 1;
		$this->postData['ios']['payload']['aps']['sound'] = "bingbong.aiff";
		$this->postData['ios']['payload'] = array_merge($this->postData['ios']['payload'], $extFields);
		$this->postData['ios']['production_mode'] = 'true';

		$output = $this->sendPushByIos($this->postData['ios']);
		
		return $output;
	}

	// Listcast
	public function androidPushByListcast($title, $content, $deviceToken, array $extFields=[]){

		$this->postData['android']['appkey'] = self::androidAppKey;
		$this->postData['android']['timestamp'] = time();
		$this->postData['android']['type'] = 'listcast';
		$this->postData['android']['device_tokens'] = $deviceToken;
		$this->postData['android']['payload']['display_type'] = "notification";
		$this->postData['android']['payload']['body']['ticker'] = $title;
		$this->postData['android']['payload']['body']['title'] = $title;
		$this->postData['android']['payload']['body']['text'] = $content ;
		$this->postData['android']['payload'] = array_merge($this->postData['android']['payload'], $extFields);
		$this->postData['android']['production_model'] = "true";

		$output = $this->sendPushByAndroid($this->postData['android']);
		
		return $output;
	}

	// Broadcast
	public function iosPushByBroadcast($title, $content, array $extFields=[]){

		$this->postData['ios']['appkey'] = self::iosAppKey;
		$this->postData['ios']['timestamp'] = time();
		$this->postData['ios']['type'] = 'broadcast';
		$this->postData['ios']['payload']['aps']['alert']['title'] = $title;
		$this->postData['ios']['payload']['aps']['alert']['body'] = $content;
		$this->postData['ios']['payload']['aps']['badge'] = 1;
		$this->postData['ios']['payload']['aps']['sound'] = "bingbong.aiff";
		$this->postData['ios']['payload'] = array_merge($this->postData['ios']['payload'], $extFields);
		$this->postData['ios']['production_mode'] = 'true';

		$output = $this->sendPushByIos($this->postData['ios']);
		return $output;
	}

	// Broadcast
	public function androidPushByBroadcast($title, $content, array $extFields=[]){

		$this->postData['android']['appkey'] = self::androidAppKey;
		$this->postData['android']['timestamp'] = time();
		$this->postData['android']['type'] = 'broadcast';
		$this->postData['android']['payload']['display_type'] = "notification";
		$this->postData['android']['payload']['body']['ticker'] = $title;
		$this->postData['android']['payload']['body']['title'] = $title;
		$this->postData['android']['payload']['body']['text'] = $content ;
		$this->postData['android']['payload'] = array_merge($this->postData['android']['payload'], $extFields);
		$this->postData['android']['production_model'] = "true";

		$output = $this->sendPushByAndroid($this->postData['android']);
		return $output;
	}
    


}
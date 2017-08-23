<?php
/**
* 友盟推送
*/

class UmengPush {

	const appKey = "582ed0a0677baa081c000ab2";
	const uMengUrl =  "http://msg.umeng.com/api/send";
	const appMasterSecret = "lsnn5qf9pjggson7uxuvfyhnkaagxlmv";
	const httpMethod = 'POST';


	public function iosPushByListcast($title,$content,$deviceToken){

		$postData['appkey'] = self::appKey;
		$postData['timestamp'] = time();
		$postData['type'] = 'listcast';
		$postData['device_tokens'] = $deviceToken;
		$postData['payload']['aps']['alert']['title'] = $title;
		$postData['payload']['aps']['alert']['body'] = $content;

		$postData['payload']['aps']['badge'] = 1;
		$postData['payload']['aps']['sound'] = "bingbong.aiff";
		$postData['payload']['businessname'] = 0;
		$postData['filter']['where']['and'][] = $filter;
		$postData['production_mode'] = 'true';

		var_dump($postData);
		exit;


		$post_body = json_encode($postData);
		// 请求方法
		$http_method = self::httpMethod;
		// 请求url信息
		$url = self::uMengUrl;
		$app_master_secret = self::appMasterSecret;

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

	    $ret = $output->ret;

	    var_dump($output);
	    var_dump($ret);
	    exit;

	}

	public function androidPush(){

	}




}
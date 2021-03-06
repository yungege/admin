<?php
/**
 * @declare 基类server
 */
class BasePageService {
    const HTTP_PREFIX = 'http://';
    const HTTPS_PREFIX = 'https://';

    protected $declarePageInfo;
    protected $declareUserInfo;
    protected $declareAdaptInfo;
    protected $declareHeaderInfo;
    protected $declareAuth = true;
    protected $declareLogin = true;
    protected $declareInherit;
    protected $declareUrl;
    protected $declareAdapt;
    protected $declarelog;
    protected $declareHidePgcPop;
    protected $declareCheckXss;
    // protected $declareAuthUrl = true;

    protected $req;
    protected $res;

	protected $errNo = 0;
	protected $errMsg = '';

    public function execute($req){

        $this->req = $req;
        $this->res = [
			'errCode' => 0, 
			'errMessage' => '',
			'data' => []
		];

        try{

            $this->__declare();

            //开始计时
            $this->_timerRecord('start');

            //pageInfo
            $this->_pageInfo();


            //adaptInfo
            $this->_adaptInfo();

            //headerInfo
            $this->_headerInfo();

            //url
            $this->_url();

            //checkLogin
            if($this->_checkLogin($req) === false){
                header("HTTP/1.1 301 REDIRECT");
                header('Location:/login.html');
                exit;
            }

            //业务逻辑        
            $res = $this->__execute($req);
            if(!isset($res['userInfo']) && !empty($_SESSION['userInfo']))
                $res['userInfo'] = $_SESSION['userInfo'];
            
			$this->res['errCode'] = $this->errNo;
			$this->res['errMessage'] = $this->errMsg ? : setError($this->errNo);
            $this->res['data'] = $res ? (array)$res : array();

        }catch(Exception $e){
            $file = date('Y-m-d').'error';
            $errno = $e->getCode();
            $errstr = $e->getMessage();
            $this->res['errCode'] = (int)$errno ? : -1;
            $this->res['errMessage'] = !empty(trim($errstr)) ? $errstr : setError($errno);
			Log::writeLog($file, $errstr, $_SERVER['REQUEST_URI']);
		}

        $this->_pageInfoAfter();
        $this->_adaptInfoAfter();

        //结束计时
        $this->_timerRecord('end');

        //日志
        $this->_log();

        return $this->res;
    }

    //执行逻辑 子类重载
    protected function __execute($req){
        return null;
    } 

    //填充pageInfo
    private function _pageInfo(){
        if($this->declarePageInfo){

            $requestURI = $_SERVER['REQUEST_URI'];

            $requestBase = ($_SERVER['HTTPS'] ? self::HTTPS_PREFIX : self::HTTP_PREFIX) . $_SERVER['HTTP_HOST'];

            $today = getdate();
            $currentYear = $today['year'];

            $pageInfo = array(
                    'currentYear' => $currentYear, 
                    'referer' => array_key_exists("HTTP_REFERER",$_SERVER)?$_SERVER['HTTP_REFERER']:'',
                    'userAgent' => array_key_exists("HTTP_USER_AGENT",$_SERVER)?$_SERVER['HTTP_USER_AGENT']:'',
                    'requestURI' => $requestURI,
                    'requestBase' => $requestBase,
                    'requestWith' => array_key_exists("HTTP_X_REQUESTED_WITH",$_SERVER)?$_SERVER['HTTP_X_REQUESTED_WITH']:'',
                    ); 

            $this->res['data']['pageInfo'] = $pageInfo;
        } 
    }

    private function _pageInfoAfter(){
        if(isset($this->declarePageInfo['hide'])){
            unset($this->res['data']['pageInfo']);
        }
    }

    //补充pageInfo
    public function addPageInfo($key, $value){
        $this->res['data']['pageInfo'][$key] = $value;
    }

    //补充userInfo
    public function addUserInfo($key, $value){
        $this->res['data']['userInfo'][$key] = $value;
    }

    //补充header
    public function addHeaderInfo($key, $value){
        $this->res['data']['headerInfo'][$key] = $value;
    }

    //填充适配信息
    private function _adaptInfo(){
        if(isset($this->declareAdaptInfo)){
            if(preg_match("/iPad/", $this->res['data']['pageInfo']['userAgent']) || $this->req['request_param']['html']==1){
                $this->data['adaptInfo']['iPad'] = true;
            }
        }
    }

    private function _adaptInfoAfter(){
        if(isset($this->declareAdaptInfo['hide'])){
            unset($this->res['data']['adaptInfo']);
        }
    }


    //check xss
    public function checkXss(&$string, $low = False)
    {
        if (!is_array($string))
        {
            $string = trim($string);
            $string = strip_tags($string);
            $string = htmlspecialchars($string);

            if ($low)
            {
                return True;
            }

            // $string = str_replace(array('"', "\\", "'", "/", "..", "../", "./", "//"), '', $string);
            $no = '/%0[0-8bcef]/';
            $string = preg_replace($no, '', $string);
            $no = '/%1[0-9a-f]/';
            $string = preg_replace($no, '', $string);
            $no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
            $string = preg_replace($no, '', $string);
            return True;
        }

        $keys = array_keys($string);

        foreach ($keys as $key)
        {
            $this->checkXss($string[$key]);
        }
    }

    //url
    private function _url(){
        if($this->declareUrl){
            $data = &$this->res['data'];
            $data['url'] = array();
            if(is_array($this->declareUrl)){
                foreach($this->declareUrl as $k=>$v){
                    $data['url'][$k] = $v;
                }
            }
        }
    }

    //header
    private function _headerInfo(){
        if($this->declareHeaderInfo){
            $data = &$this->res['data'];
            $data['headerInfo'] = array();
            if(is_array($this->declareHeaderInfo)){
                foreach($this->declareHeaderInfo as $v){
                    $data['headerInfo'][] = $v;
                }
            }
        }
    }

    // 解析签名
    private function _getClientSet(&$req){
        $client_set = array();
        $UD = $req[strtolower(REQUEST_METHOD)]['UD'];

        if(empty($UD))
            return;

        $UD = base64_decode($UD);
        $UD = explode('&', $UD);

        foreach($UD as $v){
            $tmp = explode('=', $v);
            $client_set[$tmp[0]] = $tmp[1];
        }
        
        $req[strtolower(REQUEST_METHOD)]['client_set'] = $client_set;
    }

    //签名验证
    private function _checkAuth(){

    }

    //登录验证
    protected function _checkLogin($req){
        if(false === $this->declareLogin)
            return true;

        if(empty($_SESSION['userInfo']))
            return false;

        $uid = $_SESSION['userInfo']['_id'];
        $admin = Dao_BackendAdminModel::getInstance();
        $user = $admin->queryOne(['userid' => $uid]);
        if(empty($user)){
            session_destroy();
            return false;
        }

        return true;
    }

    //计时
    private function _timerRecord($point){
        $this->timer[$point] = microtime();
    }

    //日志
    public function _log(){
        try{ 
            $this->_accessLog();
        }catch(Exception $e){
            Log::writeLog('warning', $e->getMessage());
        }
    }

    private function _accessLog(){
        $file = date('Y-m-d');

        //间隔线
        Log::writeLog($file, '====================='.date('Y-m-d H:i:s').'===========================', '');

        Log::writeLog($file, 'service_cost', ($this->timer['end'] - $this->timer['start'])*1000);
        Log::writeLog($file, 'time',date('d/M/Y:H:i:s O'));

        //entrytype
        Log::writeLog($file, "entrance_type", $_SERVER['HTTP_USER_AGENT']);

        //ourl
        $ourl = $_SERVER['REQUEST_URI'];
        $cookie = '';
        foreach( $_COOKIE as $key=>$value ){
            $cookie .= $key.':'.$value.';';
        }
        Log::writeLog($file, "ourl",$ourl);
        Log::writeLog($file, 'request_method',$_SERVER['REQUEST_METHOD']);
        Log::writeLog($file, 'cookie',$cookie);
        Log::writeLog($file, 'client_ip', Ip::getClientIp());
        //处理过程的返回状态
        Log::writeLog($file, "error_no", $this->res["errCode"]);
        Log::writeLog($file, "error_msg", $this->res['errMessage'] ? : '');
        Log::writeLog($file, "url", $_SERVER['REQUEST_URI'] ? : '');
        Log::writeLog($file, "request_content", json_encode($this->req) ? : '');    
    }


}

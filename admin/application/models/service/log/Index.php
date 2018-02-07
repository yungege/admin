<?php
class Service_Log_IndexModel extends BasePageService {

    protected $resData = [];

    public function __construct() {
       
    }

    protected function __declare() {
       
        
    }

    protected function __execute() {
       
        $date = date('Y-m-d',time());
        $content = Log::readLog($date);
        $content = explode("\r\n",$content);
        $this->resData['content'] = $content ? $content : [] ;
        
        return $this->resData;
    }

}
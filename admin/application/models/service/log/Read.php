<?php
class Service_Log_ReadModel extends BasePageService {

    protected $resData = [];

    public function __construct() {
       
    }

    protected function __declare() {
       
        
    }

    protected function __execute($req) {

       
        $date = date('Y-m-d',time());
        $content = Log::readLog($date);
        $content = explode("\r\n",$content);
        $this->resData['content'] = $content;
        

        // var_dump($this->resData);
        // exit;


        return $this->resData;
    }

}
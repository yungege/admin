<?php
class Service_Log_ReadModel extends BasePageService {

    protected $resData = [];

    public function __construct() {
       
    }

    protected function __declare() {
       
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $content = Log::readLog($req['startTime']);
        $this->resData['content'] = $content ? explode("\r\n",$content) : [] ;

        // var_dump($this->resData);
        // exit;

        return $this->resData;
    }

}
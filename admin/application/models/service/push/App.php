<?php
class Service_Push_AppModel extends BasePageService {

    public function __construct(){
        
    }

    protected function __declare(){

    }

    protected function __execute($req){
        return ['uptoken' => getUploadToken()];
    }

}
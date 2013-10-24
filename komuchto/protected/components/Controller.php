<?php
class Controller extends CController {
    public function init() {
        parent::init();
        
        $parts = explode('/', Yii::app()->request->requestUri);
        //var_dump($parts);
        if($parts[1] == 'admin')
            $this->layout = 'admin';
        else $this->layout = 'main';
        
        if (Yii::app()->request->getIsAjaxRequest()) {
                   $this->layout = 'ajax';
       }
    }
}
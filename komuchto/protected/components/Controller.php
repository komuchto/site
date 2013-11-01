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
    
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'controllers'=>array('admin/users','admin/stat','admin/adverts'),
                'roles'=>array('user','guest'),
            ),
            array('deny',
                'actions'=>array('delete'),
                'roles'=>array('moderator'),
            ),
        );
    }
}
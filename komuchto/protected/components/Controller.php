<?php
class Controller extends CController {
    
    public $city = null;
    
    public function init() {
        parent::init();
        
        Yii::import('system.zii..widgets.CListView');
        
        $parts = explode('/', Yii::app()->request->requestUri);

        if($parts[1] == 'admin')
            $this->layout = 'admin';
        else $this->layout = 'main';
        
        if (Yii::app()->request->getIsAjaxRequest())
                   $this->layout = 'ajax';
       
        $this->city = "City";
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
                'controllers'=>array('admin/users','admin/stat','admin/adverts'),
                'users' => array('?'),
            ),
            array('deny',
                'actions'=>array('delete'),
                'roles'=>array('moderator'),
            ),
        );
    }
    
    private function geo()
    {
        
    }
}
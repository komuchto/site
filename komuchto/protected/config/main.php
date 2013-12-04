<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Кому-что',
        'theme'=>'bootstrap',
        'charset'=>'utf-8',
        'language'=>'ru',
        'preload' => array(
            'debug',
        ),

	// autoloading model and component classes
	'import'=>array(
            'application.models.*',
            'application.components.*',
            'ext.eoauth.*',
            'ext.eoauth.lib.*',
            'ext.lightopenid.*',
            'ext.eauth.*',
            'ext.eauth.services.*',
            'ext.EUploadedImage',
            'ext.lyiightbox.*',
	),

	'defaultController'=>'site',
	// application components
	'components'=>array(
            'session' => array (
                'sessionName' => 'PHPSESSID',
                'class'=> 'CDbHttpSession',
                'connectionID' => 'db',
                'sessionTableName' => 'session',
                'cookieMode' => 'allow',
            ),
            'urlManager'=>array(
                    'baseUrl'=>'http://komuchto',
                    'urlFormat'=>'path',
                    'showScriptName'=>false,
                    'urlSuffix'=>'/',
                    'rules'=>array(
                        '/'=>'adverts/list',
                        'login'=>'users/login',
                        'logout'=>'users/logout',
                        'users/<id:\d+>'=>'users/view',
                        'admin'=>'admin/stat/index',
                        '<id:\d+>'=>'adverts/view',
                        'edit/<id:\d+>'=>'adverts/edit',
                        'fav/<id:\d+>'=>'adverts/fav',
                        'art/<action:\w+>'=>'adverts/<action>',
                    ),
            ),
            'db'=>array(
                'class'=>'CDbConnection',
                'connectionString'=>'mysql:host=localhost;dbname=komuchto',
                'username'=>'root',
                'password'=>'',
                'charset' => 'utf8',
                // включаем профайлер 
                'enableProfiling'=>true, 
                // показываем значения параметров 
                'enableParamLogging' => true, 
            ),
            'debug' => array(
                'class' => 'ext.yii2-debug.Yii2Debug',
            ),
            'authManager'=>array(
                'class'=>'CDbAuthManager',
                'defaultRoles'=>array('user', 'moderator', 'admin'),
            ),
            'errorHandler'=>array(
                'errorAction'=>'site/error',
            ),
            'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',
            ),
            'geoip' => array(
                'class' => 'application.extensions.geoip.CGeoIP',
                'filename' => dirname(__FILE__).'/../../files/GeoLiteCity.dat',
                'mode' => 'STANDARD',
            ),
            'loid' => array(
                'class' => 'ext.lightopenid.loid',
            ),
            'eauth' => array(
                'class' => 'ext.eauth.EAuth',
                'popup' => true, // Use the popup window instead of redirecting.
                'services' => array( // You can change the providers and their classes.
                    'google' => array(
                        'class' => 'GoogleOpenIDService',
                        //'realm' => '*.example.org',
                    ),
                    'yandex' => array(
                        'class' => 'YandexOpenIDService',
                        //'realm' => '*.example.org',
                    ),
                    'twitter' => array(
                        // register your app here: https://dev.twitter.com/apps/new
                        'class' => 'TwitterOAuthService',
                        'key' => '75CcmZ68bI6I3sM6JMixbQ',
                        'secret' => 'awuqsBravvOw2zgfwtY3wwYGK31Ik24xY1kiBDBHvHk',
                    ),
                    'google_oauth' => array(
                        // register your app here: https://code.google.com/apis/console/
                        'class' => 'GoogleOAuthService',
                        'client_id' => '981344715246.apps.googleusercontent.com',
                        'client_secret' => 'AepOwm6_az7hP8e7GpjT6UvD',
                        'title' => 'Google (OAuth)',
                    ),
                    'facebook' => array(
                        // register your app here: https://developers.facebook.com/apps/
                        'class' => 'FacebookOAuthService',
                        'client_id' => '585402121519001',
                        'client_secret' => 'ca63657204271284c3a9e00529f097e5',
                    ),
                    'vkontakte' => array(
                        // register your app here: https://vk.com/editapp?act=create&site=1
                        'class' => 'VKontakteOAuthService',
                        'client_id' => '3954224',
                        'client_secret' => 'VqOH2Ql8mEP7UcW7FXOl',
                    ),
                    'mailru' => array(
                        // register your app here: http://api.mail.ru/sites/my/add
                        'class' => 'MailruOAuthService',
                        'client_id' => '712092',
                        'client_secret' => '429d572a64c9ab71c3f416706554442a',
                    ),
                    'moikrug' => array(
                        // register your app here: https://oauth.yandex.ru/client/my
                        'class' => 'MoikrugOAuthService',
                        'client_id' => '50b0fbb556d24105822947729895a640',
                        'client_secret' => '80a1d519c828431691179543899bb064',
                    ),
                    'odnoklassniki' => array(
                        // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                        // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                        'class' => 'OdnoklassnikiOAuthService',
                        'client_id' => '199865088',
                        'client_public' => 'CBAELKOMABABABABA',
                        'client_secret' => '141EB7EE5288C47F41B8E29D',
                        'title' => 'Одноклассники',
                    ),
                ),
            ),
	),
        'params' => array(
            'adminPerPage' => 50,
            'advertsPerPage' => 10,
        ),

);

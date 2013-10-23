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

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.eoauth.*',
        'ext.eoauth.lib.*',
        'ext.lightopenid.*',
        'ext.eauth.*',
        'ext.eauth.services.*',
	),

	'defaultController'=>'site',

	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>'/',
			'rules'=>array(
                            //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                            'login'=>'site/login',
                            'users/<id:\d+>'=>'users/view'
			),
		),
            'db'=>array(
                'class'=>'CDbConnection',
                'connectionString'=>'mysql:host=localhost;dbname=komuchto',
                'username'=>'root',
                'password'=>'',
            ),
            'errorHandler'=>array(
                'errorAction'=>'site/error',
            ),
            'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',
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
                        'key' => '...',
                        'secret' => '...',
                    ),
                    'google_oauth' => array(
                        // register your app here: https://code.google.com/apis/console/
                        'class' => 'GoogleOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                        'title' => 'Google (OAuth)',
                    ),
                    'facebook' => array(
                        // register your app here: https://developers.facebook.com/apps/
                        'class' => 'FacebookOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                    ),
                    'linkedin' => array(
                        // register your app here: https://www.linkedin.com/secure/developer
                        'class' => 'LinkedinOAuthService',
                        'key' => '...',
                        'secret' => '...',
                    ),
                    'github' => array(
                        // register your app here: https://github.com/settings/applications
                        'class' => 'GitHubOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                    ),
                    'vkontakte' => array(
                        // register your app here: https://vk.com/editapp?act=create&site=1
                        'class' => 'VKontakteOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                    ),
                    'mailru' => array(
                        // register your app here: http://api.mail.ru/sites/my/add
                        'class' => 'MailruOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                    ),
                    'moikrug' => array(
                        // register your app here: https://oauth.yandex.ru/client/my
                        'class' => 'MoikrugOAuthService',
                        'client_id' => '...',
                        'client_secret' => '...',
                    ),
                    'odnoklassniki' => array(
                        // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                        // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                        'class' => 'OdnoklassnikiOAuthService',
                        'client_id' => '...',
                        'client_public' => '...',
                        'client_secret' => '...',
                        'title' => 'Odnokl.',
                    ),
                ),
            ),
	)

);
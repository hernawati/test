<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Blog Demo',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.fpdf.*',

	),

	'defaultController'=>'site',
	
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'sirs',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'rawatJalan'=>array(),
		'radiologi'=>array(),
		'Pendaftaran',
		'Poliklinik',
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class' => 'application.components.EWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		/* SQLite Database
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		*/
		// MYSQL Database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=database',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => '',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'salt' => '$2a$10$1qAz2wSx3eDc4rFv5tGb5e4jVuld5/KF2Kpy.B8D2XoC031sReFGi',
		'adminEmail'=>'webmaster@example.com',
	),
);
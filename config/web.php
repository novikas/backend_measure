<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'efj_YCWso0rbhfw8URONCNLex05QScXC',
        	'parsers' => [
        		'application/json' => 'yii\web\JsonParser'
        	]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    	
    	'urlManager' => [
    		'enablePrettyUrl' => true,
    		'enableStrictParsing' => true,
    		'showScriptName' => false,
    		'rules' => [
    				[
	    				'class' => 'yii\rest\UrlRule',
	    				'controller' => ['nodb' => 'nodb'],
	    				'patterns' => [
	    					"GET messages" => "message",
	    					"POST messages" => "add-message",
	    				],
    				],
    				[
	    				'class' => 'yii\rest\UrlRule',
	    				'controller' => ['db' => 'db'],
	    						'patterns' => [
	    							"GET messages" => "message",
	    							"POST messages" => "add-message",
	    						],
    				],
    				[
	    				'class' => 'yii\rest\UrlRule',
	    				'controller' => ['images' => 'image'],
	    						'patterns' => [
	    							"GET like.png" => "like",
	    						],
    				],
    		],
    	],
    	'user' => [
            'identityClass' => 'app\models\User',
        	 'enableSession' => false
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

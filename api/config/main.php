<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'customer-list-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'defaultRoute' => 'v1/default',
    'modules' => [
        'v1' => [
            //'basePath' => '@app/modules/v1',
            'class' => \api\modules\v1\Module::className(),
        ]
    ],
    'bootstrap' => [
    	'log',
        [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
                'application/xml' => \yii\web\Response::FORMAT_XML,
            ],
        ],
    ],
    'components' => [
    	'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
			'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/contact',
                    'patterns' => [
                        'PUT,PATCH {id}' => 'update',
                        'DELETE {id}' => 'delete',
                        'GET,HEAD {id}' => 'view',
                        'POST,OPTIONS' => 'create',
                        'GET,HEAD' => 'index',
                        'OPTIONS' => 'options',
                        '{id}' => 'options',
                        '' => 'options',
                    ],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                ],
                '<action:[\w\-]+>' => 'site/<action>',
                '<controller:\w+>/<id:[\d\-]+>' => 'v1/<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:[\d\-]+>' => 'v1/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => 'v1/<controller>/<action>',
                '<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => \yii\web\Response::className(),
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && ($exception = Yii::$app->getErrorHandler()->exception) !== null) {
                    $response->data = [
                        'error' => $response->data,
                    ];
                }
            },
                ],
            ],
            'params' => $params,
        ];
        

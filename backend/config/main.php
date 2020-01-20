<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'backend\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/bandas'],
                    'extraPatterns' => [
                        'GET perfil/{id}' => 'perfil',
                        'GET feed' => 'feed',
                        'GET feedhabilidade/{idhabilidade}' => 'feedhabilidade',
                        'GET membros/{iduser}' => 'membros',
                        // 'POST feedhabilidade' => 'feedhabilidade',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                        '{idhabilidade}' => '<idhabilidade:\\d+>',
                        '{iduser}' => '<iduser:\\d+>',
                    ],
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/user'],
                    'extraPatterns' => [
                        'GET total' => 'total',
                        'POST verificaLogin' => 'verifica',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                        '{user}' => '<user:\\w+>',
                        '{pw}' => '<pw:[\-]?\w+>',
                    ],
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/profiles'], 
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/banda-habilidades'],
                    'extraPatterns' => [
                        'GET feed' => 'feed',
                        'GET feeed/{id}' => 'feeed',
                    ],
                    'pluralize' => false,
                ],
            ],
        ],
    ],
    'params' => $params,
];

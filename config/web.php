<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language'=>'zh-CN',
    'homeUrl'=> ['/tables/index'],//首页
    'bootstrap' => [
        'log',
        'admin',
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
//            'layout' => 'left-menu',//yii2-admin的导航菜单
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
        'allowActions' => [
            'site/login',//允许访问的节点，可自行添加
        ]
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'u4MHNPRI_8oJiW6bt5noiDVnr_LZeSsN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'idParam' => '_user',
            'identityCookie'    => ['name'=>'_u','httpOnly' => true],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'urlManager' => [
            'enablePrettyUrl' => true, //对url进行美化
            'showScriptName' => false,//隐藏index.php
//            'suffix' => '.html',//后缀
//            'enableStrictParsing'=>FALSE,//不要求网址严格匹配，则不需要输入rules
            'rules' => [
                // 为路由指定一个别名简化网址
                '' => 'site',
                //标准的控制器/方法显示
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //加id参数
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            ]
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'zh-cn',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
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

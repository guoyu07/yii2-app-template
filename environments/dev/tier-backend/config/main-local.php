<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
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
if (YII_ENV_DEV) {    
    // to debug the yii2-utility extension locally
    $config['aliases']['@ut'] = '/home/drodata/www/yii2-utility'; // Debian
    //$config['aliases']['@ut'] = '/Users/drodata/www/yii2-utility'; // Mac

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',      
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],  
        'generators' => [
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'templates' => [
                    'local' => '@ut/gii/backend/model/default',
                ]
            ],
            // 使用 yii2-utility 中的generator, 如果想使用本地的类，记得在 entry script 内覆盖 classMap
            'crud' => [
                'class' => 'drodata\gii\backend\crud\Generator',
                'templates' => [
                    // 方便在本地调试 yii2-utility extension
                    'local' => '@ut/gii/backend/crud/default',
                ]
            ],
            'controller' => [
                'class' => 'drodata\gii\backend\controller\Generator',
                'templates' => [
                    'local' => '@ut/gii/backend/controller/default',
                ]
            ],
            /*
            'controller-api' => [
                'class' => 'drodata\gii\api\controller\Generator',
                'templates' => [
                    'default' => '@ut/gii/api/controller/default',
                ]
            ],
            */
            'form' => [
                'class' => 'yii\gii\generators\form\Generator',
                'templates' => [
                    'drodata' => '@drodata/gii/backend/form/default',
                    'drodata-local' => '@ut/gii/backend/form/default',
                ]
            ],
        ],
    ];
}

return $config;

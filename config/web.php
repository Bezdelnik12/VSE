<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

define('NO_REG', true);

//Функция построения дерева из массива от Tommy Lacroix
function getTree($dataset) {
    $tree = array();

    foreach ($dataset as $id => &$node) {
        //Если нет вложений
        if (!$node['parents_id']){
            $tree[$id] = &$node;
        }else{
            //Если есть потомки то перебераем массив
            $dataset[$node['parents_id']]['childs'][$id] = &$node;
        }
    }
    return $tree;
}

//Шаблон для вывода меню в виде дерева
function tplMenu($category, $admin = false){
    $menu = '<li><a ';
    if ($admin) $menu .= 'href="/admin/menu/view?id=' . $category['id'] . '"';
    else $menu .= 'href="' . $category['link'] . '"';
    $menu .= ' title="'. $category['title'] .'">'.
        $category['title'].'</a>';

    if(isset($category['childs'])){
        $menu .= '<ul>'. showCat($category['childs'], $admin, '') .'</ul>';
    }
    $menu .= '</li>';

    return $menu;
}

//Шаблон для вывода меню в виде дерева
function tplMenu2($category, $no_tpl){
    $menu = $no_tpl . $category['id'] . ':' . $category['title'] . "\n";

    if(isset($category['childs'])){
        $no_tpl .= '&nbsp;';
        $menu .= showCat($category['childs'], false, $no_tpl);
    }

    return $menu;
}

/**
 * Рекурсивно считываем наш шаблон
 **/
function showCat($data, $admin = false, $no_tpl = ''){
    $string = '';
    foreach($data as $item){
        if ($no_tpl) $string .= tplMenu2($item, $admin);
        else $string .= tplMenu($item, $no_tpl);
    }
    if ($no_tpl)  {
        $string = mb_substr($string, 0, -1);
        $string = explode("\n", $string);
        $_d = [];
        foreach ($string as $item) {
            $_c = explode(':', $item);
            $_d[$_c[0]] = $_c[1];
        }
        return $_d;
    }
    return $string;
}

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UtFJfMqq2I_Jszq4DKsqnHXk9H_ragEy',
            'baseURL' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'pages/<p:\d+>' => 'site/page'
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;

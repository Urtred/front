<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Book;
use app\services\Service;

class BookController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['admin', 'adminDataTables'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAdmin()
    {
        $url = 'http://localhost:8000/sort/sort/admin';

        $model = Service::load()->curl_get($url, $_GET);

        // Cria array com as colunas que precisa percorrer para criar os links
        $columns  = ['title', 'author', 'edition_year'];
        foreach ($columns as $key => $value) {
            $link[$value]  = '';
            $link[$value] .= $this->montaLink($value);
        }
        return $this->render('admin', [
            'model' => json_decode($model),
            'link' =>$link,
        ]);
    }

    public function montaLink($data)
    {
        $new = '';
        // verifica se já possui alguma ordenação para criar link com todas as ordenações
        foreach ($_GET as $key => $value) {
            if($data!==$key){
                $new .= $key.'='.$value.'&';
            }
        }
        
        // ajusta para criar o link corretamente.
        if(array_key_exists($data, $_GET)){
            switch ($_GET[$data]) {
                case 'ASC':$new .= $data.'=DESC';break;
                case 'DESC':$new .= null;break;
            }
        }else{
            $new .= $data.'=ASC';
        }
        return $new;
    }

    public function actionAdminDataTables()
    {
        $url = 'http://localhost:8000/sort/sort/admin';
        $model = Service::load()->curl_get($url, $_GET);

        return $this->render('adminDataTables', [
            'model' => json_decode($model),
        ]);
    }
}

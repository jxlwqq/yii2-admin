<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TablesController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $sql = "SELECT * FROM article";
        $articles = Yii::$app->db->createCommand($sql)->queryAll();
        $pagination = new Pagination(['totalCount' => 100]);
        return $this->render('index',['list'=>$articles,'pagination'=>$pagination]);
    }


}

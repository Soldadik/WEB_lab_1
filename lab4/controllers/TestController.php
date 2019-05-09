<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Test;

class TestController extends Controller
{
    public function actionIndex()
    {
        $query = Test::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $testn = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'testn' => $testn,
            'pagination' => $pagination,
        ]);
    }
}
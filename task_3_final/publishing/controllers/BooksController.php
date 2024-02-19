<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;

class BooksController extends Controller
{
    public function actionIndex()
    {
      return $this->render('index', ['books' => Book::getAllDataProvider()]);
    }

    public function actionEdit($id)
    {
        $model = Book::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['books/index', 'id' => $model->ID]);
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Book::findOne($id);
        $model->delete();

        return $this->redirect(['books/index']);
    }

    public function actionCreate()
    {
        $model = new Book();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['books/index', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Book;

class BooksController extends Controller
{
    public function actionIndex()
    {
      return $this->render('index', ['books' => Book::getAllDataProvider()]);
    }
}
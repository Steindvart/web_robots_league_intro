<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\BookRecord;
use app\models\BookForm;

class BooksController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index', ['books' => BookRecord::getAllDataProvider()]);
  }

  public function actionCreate()
  {
    // #PROBLEM - how to merge Form and Record in one entity?
    //            Or do data exchange better in another way?
    $form = new BookForm();
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $book = new BookRecord();
      $book->attributesFromForm($form);
      if ($book->save()) {
        return $this->redirect(['index']);
      }
    }

    return $this->render('create', [
      'model' => $form,
    ]);
  }

  public function actionDelete($id)
  {
    $model = BookRecord::findOne($id);
    $model->delete();

    return $this->redirect(['index']);
  }

  public function actionUpdate($id)
  {
    $book = BookRecord::findOne($id);
    $form = new BookForm();
    $form->attributesFromRecord($book);
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $book->attributesFromForm($form);
      if ($book->save()) {
        return $this->redirect(['index']);
      } else {
        // #DEFECT - no message in not validate case
        // Yii::$app->session->setFlash(
        //   'validate',
        //   false
        // );
      }
    }

    return $this->render('update', [
      'model' => $form,
      'id' => $id,
    ]);
  }
}
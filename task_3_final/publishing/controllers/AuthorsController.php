<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\authors\AuthorRecord;
use app\models\authors\AuthorSearch;
use app\models\authors\AuthorForm;

class AuthorsController extends Controller
{
  public function actionIndex()
  {
    $searchModel = new AuthorSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'authors' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionCreate()
  {
    $form = new AuthorForm();
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $book = new AuthorRecord();
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
    $model = AuthorRecord::findOne($id);
    $model->delete();

    return $this->redirect(['index']);
  }

  public function actionUpdate($id)
  {
    $book = AuthorRecord::findOne($id);
    $form = new AuthorForm();
    $form->attributesFromRecord($book);
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $book->attributesFromForm($form);
      if ($book->save()) {
        return $this->redirect(['index']);
      }
    }

    return $this->render('update', [
      'model' => $form,
      'id' => $id,
    ]);
  }
}
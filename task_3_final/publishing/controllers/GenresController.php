<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\genres\GenreRecord;
use app\models\genres\GenreSearch;
use app\models\genres\GenreForm;

class GenresController extends Controller
{
  public function actionIndex()
  {
    $searchModel = new GenreSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'genres' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionCreate()
  {
    $form = new GenreForm();
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $book = new GenreRecord();
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
    $model = GenreRecord::findOne($id);
    $model->delete();

    return $this->redirect(['index']);
  }

  public function actionUpdate($id)
  {
    $genre = GenreRecord::findOne($id);
    $form = new GenreForm();
    $form->attributesFromRecord($genre);
    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $genre->attributesFromForm($form);
      if ($genre->save()) {
        return $this->redirect(['index']);
      }
    }

    return $this->render('update', [
      'model' => $form,
      'id' => $id,
    ]);
  }
}
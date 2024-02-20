<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\books\BookAuthorsGenresRecord;
use app\models\genres\GenreRecord;
use app\models\authors\AuthorRecord;

class SiteController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::class,
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::class,
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ]
    ];
  }

  public function actionFilterBooks($genreId, $authorId)
  {
    if ($genreId == 'All' && $authorId == 'All') {
      $dataProvider = BookAuthorsGenresRecord::getAllDataProvider();
    } elseif ($genreId == 'All') {
      $dataProvider = BookAuthorsGenresRecord::getDataProviderByAuthor($authorId);
    } elseif ($authorId == 'All') {
      $dataProvider = BookAuthorsGenresRecord::getDataProviderByGenre($genreId);
    } else {
      $dataProvider = BookAuthorsGenresRecord::getDataProviderByGenreAndAuthor($genreId, $authorId);
    }

    return $this->renderPartial('/books/all-books-info-grid', ['books' => $dataProvider]);
  }

  public function actionIndex()
  {
    return $this->render('index', [
      'books' => BookAuthorsGenresRecord::getAllDataProvider(),
      'genres' => GenreRecord::findGenresNames(),
      'authors' => AuthorRecord::findAuthorsNames(),
    ]);
  }
}

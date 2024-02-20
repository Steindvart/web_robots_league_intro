<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\books\BookAuthorsGenresRecord;
use app\models\genres\GenreRecord;
use app\models\authors\AuthorRecord;

class SiteController extends Controller
{
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

    // #DEFECT - change link to '/filter-books' in pagination buttons
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

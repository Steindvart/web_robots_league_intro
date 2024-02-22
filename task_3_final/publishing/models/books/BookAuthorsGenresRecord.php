<?php

namespace app\models\books;

use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;

use app\models\authors\AuthorRecord;
use app\models\genres\GenreRecord;

// #REFACTORING - we can establish relationships between tables without creating additional sql views.
class BookAuthorsGenresRecord extends ActiveRecord
{
  public static function tableName()
  {
    return 'books_authors_genres';
  }

  public function attributes()
  {
    return [
      'ID',
      'ISBN',
      'Name',
      'Pages',
      'Publish_date',
      'Authors',
      'Genres',
    ];
  }

  public static function primaryKey()
  {
    return ['ID'];
  }

  // #REFACTORING - establish relationships like this in BookRecord and etc.
  public function getGenres()
  {
    return $this->hasMany(GenreRecord::class, ['ID' => 'Genre_ID'])
                ->viaTable('Books_Genres', ['Book_ID' => 'ID']);
  }

  public function getAuthors()
  {
    return $this->hasMany(AuthorRecord::class, ['ID' => 'Author_ID'])
                ->viaTable('Books_Authors', ['Book_ID' => 'ID']);
  }

  public static function getDataProviderByGenre($genreId)
  {
      return new ArrayDataProvider([
          'allModels' => self::find()->innerJoinWith('genres')
                          ->where(['genres.ID' => $genreId])
                          ->all(),
      ]);
  }

  public static function getDataProviderByAuthor($authorId)
  {
      return new ArrayDataProvider([
          'allModels' => self::find()->innerJoinWith('authors')
                          ->where(['authors.ID' => $authorId])
                          ->all(),
      ]);
  }

  public static function getDataProviderByGenreAndAuthor($genreId, $authorId)
  {
      return new ArrayDataProvider([
          'allModels' => self::find()->innerJoinWith(['genres', 'authors'])
                          ->where(['genres.ID' => $genreId, 'authors.ID' => $authorId])
                          ->all(),
      ]);
  }

  public static function getAllDataProvider()
  {
    return new ArrayDataProvider([
      'allModels' => self::find()->all(),
    ]);
  }
}

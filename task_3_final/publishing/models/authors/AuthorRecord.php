<?php

namespace app\models\authors;

use yii\db\ActiveRecord;
use yii\db\Expression;
use app\models\authors\AuthorForm;

class AuthorRecord extends ActiveRecord
{
  public static function tableName()
  {
    return 'authors';
  }

  public function attributesFromForm(AuthorForm $data)
  {
    $this->Name = $data->Name;
    $this->Surname = $data->Surname;
  }

  public function attributes()
  {
    return [
      'ID',
      'Name',
      'Surname',
    ];
  }

  public function rules()
  {
    return [
      [['Name'], 'required'],
      ['Name', 'string', 'max' => 255],
      ['Surname', 'string', 'max' => 255],
    ];
  }

  public static function findAuthorsNames(): array
  {
    return self::find()
      ->select([new Expression("CONCAT(Name, ' ', Surname) AS FullName"), 'ID'])
      ->indexBy('ID')
      ->column();
  }

  public static function findTopAuthors(int $limit)
  {
    return self::find()
      ->select(['CONCAT(a.Name, " ", a.Surname) AS Fullname', 'COUNT(ba.Book_ID) AS BooksQuantity'])
      ->from('Authors a')
      ->leftJoin('Books_Authors ba', 'a.ID = ba.Author_ID')
      ->leftJoin('Books b', 'ba.Book_ID = b.ID')
      ->groupBy(['a.ID'])
      ->orderBy(['BooksQuantity' => SORT_DESC])
      ->limit($limit)
      ->asArray()
      ->all();
  }
}

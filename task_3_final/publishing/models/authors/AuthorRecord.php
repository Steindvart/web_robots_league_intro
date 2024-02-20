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
}

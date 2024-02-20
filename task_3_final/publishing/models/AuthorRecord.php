<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;
use app\models\AuthorForm;

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

  public static function getAllDataProvider()
  {
    return new ArrayDataProvider([
      'allModels' => AuthorRecord::find()->all(),
    ]);
  }
}

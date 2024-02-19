<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;
use app\models\BookForm;

class BookRecord extends ActiveRecord
{
   public static function tableName()
  {
    return 'books';
  }

  public function attributesFromForm(BookForm $data)
  {
    $this->ISBN = $data->ISBN;
    $this->Name = $data->Name;
    $this->Pages = $data->Pages;
    $this->Publish_date = $data->Publish_date;
  }

  public function attributes()
  {
    return [
      'ID',
      'ISBN',
      'Name',
      'Pages',
      'Publish_date',
    ];
  }

  public function rules()
  {
    return [
      // #PROBLEM - one source of validation rules for Book data input entityes (forms, etc)?
      [['ISBN', 'Name', 'Pages'], 'required'],
      [['ISBN'], 'unique', 'targetClass' => self::class, 'message' => 'This ISBN already in use.'],
      ['ISBN', 'string', 'max' => 255],
      ['Name', 'string', 'max' => 255],
      ['Pages', 'integer', 'min' => 1, 'max' => 100000],
      ['Publish_date', 'date', 'format' => 'php:Y-m-d'],
    ];
  }

  public static function getAllDataProvider()
  {
    return new ArrayDataProvider([
      'allModels' => BookRecord::find()->all(),
    ]);
  }
}

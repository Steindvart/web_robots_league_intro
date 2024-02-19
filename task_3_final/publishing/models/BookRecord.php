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

  public static function getAllDataProvider()
  {
    return new ArrayDataProvider([
        'allModels' => BookRecord::find()->all(),
    ]);
  }
}

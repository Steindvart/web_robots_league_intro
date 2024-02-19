<?php

namespace app\models;

use yii\base\Model;
use app\models\BookRecord;

class BookForm extends Model
{
    public $ISBN;
    public $Name;
    public $Pages;
    public $Publish_date;

    public function attributeLabels() {
      return [
        'ISBN' => 'ISBN',
        'Name' => 'Name',
        'Pages' => 'Pages',
        'Publish_date' => 'Publish date',
      ];
  }

    public function attributesFromRecord(BookRecord $record) {
      $this->ISBN = $record->ISBN;
      $this->Name = $record->Name;
      $this->Pages = $record->Pages;
      $this->Publish_date = $record->Publish_date;
    }

    public function rules()
    {
      return [
        [['ISBN', 'Name', 'Pages'], 'required'],
        ['ISBN', 'string', 'max' => 255],
        ['Name', 'string', 'max' => 255],
        ['Pages', 'integer', 'min' => 1, 'max' => 100000],
        ['Publish_date', 'date', 'format' => 'php:Y-m-d'],
      ];
    }
}
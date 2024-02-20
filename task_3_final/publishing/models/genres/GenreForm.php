<?php

namespace app\models\genres;

use yii\base\Model;
use app\models\genres\GenreRecord;

class GenreForm extends Model
{
  public $Name;

  public function attributeLabels()
  {
    return [
      'Name' => 'Name'
    ];
  }

  public function attributesFromRecord(GenreRecord $record)
  {
    $this->Name = $record->Name;
  }

  public function rules()
  {
    return [
      [['Name'], 'required'],
      ['Name', 'string', 'max' => 255],
    ];
  }
}
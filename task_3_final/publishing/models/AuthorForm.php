<?php

namespace app\models;

use yii\base\Model;
use app\models\AuthorRecord;

class AuthorForm extends Model
{
  public $Name;
  public $Surname;

  public function attributeLabels() {
    return [
      'Name' => 'Name',
      'Surname' => 'Surname',
    ];
  }

  public function attributesFromRecord(AuthorRecord $record) {
    $this->Name = $record->Name;
    $this->Surname = $record->Surname;
  }

  public function rules()
  {
    return [
      ['Name', 'string', 'max' => 255],
      ['Surname', 'string', 'max' => 255],
    ];
  }
}
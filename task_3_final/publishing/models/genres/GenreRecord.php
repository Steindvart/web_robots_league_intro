<?php

namespace app\models\genres;

use yii\db\ActiveRecord;
use app\models\genres\GenreForm;

class GenreRecord extends ActiveRecord
{
  public static function tableName()
  {
    return 'genres';
  }

  public function attributesFromForm(GenreForm $data)
  {
    $this->Name = $data->Name;
  }

  public function attributes()
  {
    return [
      'ID',
      'Name',
    ];
  }

  public function rules()
  {
    return [
      [['Name'], 'required'],
      [['Name'], 'unique', 'targetClass' => self::class, 'message' => 'This genre name already in use.'],
      ['Name', 'string', 'max' => 255],
    ];
  }

  public static function findGenresNames(): array
  {
    return self::find()->select(['Name', 'ID'])->indexBy('ID')->column();
  }
}

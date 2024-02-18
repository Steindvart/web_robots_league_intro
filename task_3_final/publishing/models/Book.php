<?php

namespace app\models;

use yii\db\ActiveRecord;
use \yii\data\ArrayDataProvider;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'books';
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
            'allModels' => Book::find()->all(),
        ]);
    }
}

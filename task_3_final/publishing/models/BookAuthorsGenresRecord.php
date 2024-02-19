<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;

class BookAuthorsGenresRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'books_authors_genres';
    }

    public function attributes()
    {
        return [
            'ID',
            'ISBN',
            'Name',
            'Pages',
            'Publish_date',
            'Authors',
            'Genres',
        ];
    }

    public static function getAllDataProvider()
    {
        return new ArrayDataProvider([
            'allModels' => BookAuthorsGenresRecord::find()->all(),
        ]);
    }
}

<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use app\models\AuthorRecord;

class AuthorSearch extends AuthorRecord
{
  public function rules()
  {
    return [
      [['Name', 'Surname'], 'safe'],
    ];
  }

  public function search($params)
  {
    $query = AuthorRecord::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
      return $dataProvider;
    }

    $query->andFilterWhere(['ID' => $this->ID]);
    $query->andFilterWhere(['like', 'Name', $this->Name]);
    $query->andFilterWhere(['like', 'Surname', $this->Name]);

    return $dataProvider;
  }
}

<?php

namespace app\models\genres;

use yii\data\ActiveDataProvider;
use app\models\genres\GenreRecord;

class GenreSearch extends GenreRecord
{
  public function rules()
  {
    return [
      [['ID', 'Name'], 'safe'],
    ];
  }

  public function search($params)
  {
    $query = GenreRecord::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate())
    {
      return $dataProvider;
    }

    $query->andFilterWhere(['ID' => $this->ID]);
    $query->andFilterWhere(['like', 'Name', $this->Name]);

    return $dataProvider;
  }
}

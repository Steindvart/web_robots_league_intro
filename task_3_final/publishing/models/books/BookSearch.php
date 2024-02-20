<?php

namespace app\models\books;

use yii\data\ActiveDataProvider;
use app\models\books\BookRecord;

class BookSearch extends BookRecord
{
  public function rules()
  {
    return [
      [['ID', 'ISBN', 'Name', 'Pages', 'Publish_date'], 'safe'],
    ];
  }

  public function search($params)
  {
    $query = BookRecord::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
      return $dataProvider;
    }

    $query->andFilterWhere(['ID' => $this->ID]);
    $query->andFilterWhere(['like', 'ISBN', $this->ISBN]);
    $query->andFilterWhere(['like', 'Name', $this->Name]);
    $query->andFilterWhere(['Pages' => $this->Pages]);
    $query->andFilterWhere(['Publish_date' => $this->Publish_date]);

    return $dataProvider;
  }
}

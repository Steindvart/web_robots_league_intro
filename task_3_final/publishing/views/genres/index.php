<?php
use yii\helpers\Html;

$this->title = 'Genres';
?>

<div class="genres-index">
  <div class="body-header d-flex justify-content-between align-items-center">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('<i class="fas fa-plus mr-auto"></i> Create new genre', ['genres/create'],
                ['class' => 'btn btn-success'])
    ?>
  </div>
  <div class="body-content">
    <?= $this->render('genres-grid', ['genres' => $genres, 'searchModel' => $searchModel]) ?>
  </div>
</div>

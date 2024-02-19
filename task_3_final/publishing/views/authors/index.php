<?php
use yii\helpers\Html;

$this->title = 'Authors';
?>

<div class="authors-index">
  <div class="body-header d-flex justify-content-between align-items-center">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('<i class="fas fa-plus mr-auto"></i> Create new author', ['authors/create'],
                ['class' => 'btn btn-success'])
    ?>
  </div>
  <div class="body-content">
    <?= $this->render('authors-grid', ['authors' => $authors, 'searchModel' => $searchModel]) ?>
  </div>
</div>

<?php
use yii\helpers\Html;

$this->title = 'Books';
?>

<div class="books-index">
  <div class="body-header d-flex justify-content-between align-items-center">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('<i class="fas fa-plus mr-auto"></i> Create new book', ['books/create'],
                ['class' => 'btn btn-success'])
    ?>
  </div>
  <div class="body-content">
    <?= $this->render('books-grid', ['books' => $books]) ?>
  </div>
</div>

<?php

/** @var yii\web\View $this */

$this->title = 'Publishing house';
?>

<div class="site-index">
  <div class="body-content">
    <div class="books-content">
      <h2> All books info</h2>
      <?= $this->render('/books/all-books-info-grid', ['books' => $books]) ?>
    </div>
  </div>
</div>

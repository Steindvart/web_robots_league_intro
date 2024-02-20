<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Publishing house';

$script =
<<< JS
$(document).on('change', '#genre-filter, #author-filter', function() {
    var genreId = $('#genre-filter').val();
    var authorId = $('#author-filter').val();
    $.ajax({
        url: '/site/filter-books',
        type: 'GET',
        data: { genreId: genreId, authorId: authorId },
        success: function(data) {
            $('.books-content').html(data);
        }
    });
});
JS;

$this->registerJs($script, View::POS_READY);
?>

<div class="site-index">
  <div class="body-content">
    <h2>All books info</h2>
    <div class="d-flex align-items-center mb-2">
      <b>Genre:</b>
      <?= Html::dropDownList('genre-filter', 'All', ['All' => 'All'] + $genres, [
          'id' => 'genre-filter',
          'class'=> 'form-select ms-2'
        ]
      ) ?>

      <b class="ms-2">Author:</b>
      <?= Html::dropDownList('author-filter', 'All', ['All' => 'All'] + $authors, [
          'id' => 'author-filter',
          'class'=> 'form-select ms-2'
        ]
      ) ?>
    </div>
    <div class="books-content">
      <?= $this->render('/books/all-books-info-grid', ['books' => $books]) ?>
    </div>
  </div>
</div>
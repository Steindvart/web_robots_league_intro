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
            $('.books-all-info').html(data);
        }
    });
});
JS;

$this->registerJs($script, View::POS_READY);
?>

<div class="site-index">
  <div class="body-content">
    <div class="books-content">
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
      <div class="books-all-info">
        <?= $this->render('/books/all-books-info-grid', ['books' => $books]) ?>
      </div>
    </div>
    <hr>
    <div class="top-list-content d-flex align-items-center">
      <div class="top-authors">
        <h2>Top <?= count($topAuthors)?> authors</h2>
        <ul>
          <?php foreach ($topAuthors as $author): ?>
            <li><?= $author['Fullname'] ?> (id: <?= $author['ID'] ?>): <?= $author['BooksQuantity'] ?> books</li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="top-Genres ms-5">
        <h2>Top <?= count($topGenres)?> genres</h2>
        <ul>
          <?php foreach ($topGenres as $genre): ?>
            <li><?= $genre['Name'] ?> (<?= $genre['BooksQuantity'] ?> books)</li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
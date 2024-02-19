<?php
use yii\grid\GridView;

$books->pagination->pageSize=15;
?>

<?= GridView::widget([
  'dataProvider' => $books,
  'pager' => [
    'class' => 'yii\widgets\LinkPager',
    'options' => [
        'class' => 'pagination',
    ],
    'linkOptions' => [
        'class' => 'page-link',
    ],
    'activePageCssClass' => 'active',
    'disabledPageCssClass' => 'disabled',
    'nextPageLabel' => false,
    'prevPageLabel' => false
  ],
  'columns' => [
    'ID',
    'ISBN',
    'Name',
    'Pages',
    'Publish_date',
    'Authors',
    'Genres',
  ],
]); ?>
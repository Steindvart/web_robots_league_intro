<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$books->pagination->pageSize=15;
?>

<?= GridView::widget([
  'dataProvider' => $books,
  'filterModel' => $searchModel,
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
    [
      'class' => 'yii\grid\ActionColumn',
      'template' => '{edit} {delete}',
      'buttons' => [
        'edit' => function ($url, $model) {
          return Html::a('<button class="btn btn-primary">Edit</button>',
                          Url::to(['books/update', 'id' => $model->ID]));
        },
        'delete' => function ($url, $model) {
          return Html::a('<button class="btn btn-danger">Delete</button>',
                          Url::to(['books/delete', 'id' => $model->ID]), [
            'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
            ],
          ]);
        },
      ],
    ],
  ],
]); ?>

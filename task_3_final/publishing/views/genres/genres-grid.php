<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$genres->pagination->pageSize=15;
?>

<?= GridView::widget([
  'dataProvider' => $genres,
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
    'Name',
    [
      'class' => 'yii\grid\ActionColumn',
      'template' => '{edit} {delete}',
      'buttons' => [
        'edit' => function ($url, $model) {
          return Html::a('<button class="btn btn-primary">Edit</button>',
                          Url::to(['genres/update', 'id' => $model->ID]));
        },
        'delete' => function ($url, $model) {
          return Html::a('<button class="btn btn-danger">Delete</button>',
                          Url::to(['genres/delete', 'id' => $model->ID]), [
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

<?php
use yii\grid\GridView;
?>

<?= GridView::widget([
    'dataProvider' => $books,
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
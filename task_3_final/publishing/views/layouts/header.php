<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>

<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Main', 'url' => ['/site/index']],
        ['label' => 'Books', 'url' => ['/site/books']],
        ['label' => 'Authors', 'url' => ['/site/authors']],
        ['label' => 'Genres', 'url' => ['/site/genres']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    NavBar::end();
?>

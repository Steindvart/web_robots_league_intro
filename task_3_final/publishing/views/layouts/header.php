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
    ['label' => 'Main', 'url' => ['/']],
    ['label' => 'Books', 'url' => ['/books']],
    ['label' => 'Authors', 'url' => ['/authors']],
    ['label' => 'Genres', 'url' => ['/genres']],
  ];

  echo Nav::widget([
    'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
    'items' => $menuItems,
  ]);

  NavBar::end();
?>

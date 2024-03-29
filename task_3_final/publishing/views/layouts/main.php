<?php

/** @var \yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use app\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
  <?php echo $this->render('header') ?>
</header>

<main role="main" class="flex-shrink-0">
  <div class="container">
      <?= $content ?>
  </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
  <?php echo $this->render('footer') ?>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();

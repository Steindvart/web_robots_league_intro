<?php
use yii\bootstrap5\Html;
?>

<div class="container">
  <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
  <p class="float-end"><?= Yii::powered() ?></p>
</div>

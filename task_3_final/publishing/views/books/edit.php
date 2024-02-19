<?php
use yii\helpers\Html;

$this->title = 'Edit book info';
?>

<h1><?= Html::encode($this->title) ?></h1>
<h2>ID: <?= Html::encode($model->ID) ?></h2>

<?= $this->render('book-info-form', [
  'model'=> $model,
  'submitButton' => Html::submitButton('Save', ['class' => 'btn btn-success mt-2']),
]); ?>
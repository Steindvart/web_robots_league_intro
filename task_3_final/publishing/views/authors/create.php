<?php
use yii\helpers\Html;

$this->title = 'Create new author';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('author-form', [
  'model'=> $model,
  'submitButton' => Html::submitButton('Create', ['class' => 'btn btn-success mt-2']),
]); ?>
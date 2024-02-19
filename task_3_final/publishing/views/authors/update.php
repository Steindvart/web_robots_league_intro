<?php
use yii\helpers\Html;

$this->title = 'Edit author info';
?>

<h1><?= Html::encode($this->title) ?></h1>
<h2>ID: <?= Html::encode($id) ?></h2>

<?= $this->render('author-form', [
  'model'=> $model,
  'submitButton' => Html::submitButton('Save', ['class' => 'btn btn-success mt-2']),
]); ?>
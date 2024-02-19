<?php
use yii\helpers\Html;

$this->title = 'Create new book';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('book-info-fields', ['model'=> $model]) ?>
<?= Html::submitButton('Create', ['class' => 'btn btn-success mt-2']) ?>
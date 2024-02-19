<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
  'id' => 'book-form',
  'options' => ['class' => 'form-horizontal'],
]); ?>

<?= $form->field($model, 'ISBN')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Pages')->textInput() ?>
<?= $form->field($model, 'Publish_date')->textInput() ?>

<div class="form-group">
  <?= $submitButton ?>
</div>

<?php ActiveForm::end(); ?>
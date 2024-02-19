<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
  'id' => 'author-form',
  'options' => ['class' => 'form-horizontal'],
]); ?>

<?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>

<div class="form-group">
  <?= $submitButton ?>
</div>

<?php ActiveForm::end(); ?>
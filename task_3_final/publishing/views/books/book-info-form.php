<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'ISBN')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Pages')->textInput() ?>
<?= $form->field($model, 'Publish_date')->textInput() ?>

<?= $submitButton ?>

<?php ActiveForm::end(); ?>
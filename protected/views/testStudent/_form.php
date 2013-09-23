<?php
/* @var $this TestStudentController */
/* @var $model TestStudent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'test_id'); ?>
		<?php echo $form->textField($model,'test_id'); ?>
		<?php echo $form->error($model,'test_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'points'); ?>
		<?php echo $form->textField($model,'points'); ?>
		<?php echo $form->error($model,'points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->textField($model,'grade'); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
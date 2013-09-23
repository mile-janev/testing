<?php
/* @var $this ClickAnswerController */
/* @var $model ClickAnswer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'click-answer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textField($model,'correct',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'click_id'); ?>
		<?php echo $form->textField($model,'click_id'); ?>
		<?php echo $form->error($model,'click_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
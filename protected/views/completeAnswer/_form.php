<?php
/* @var $this CompleteAnswerController */
/* @var $model CompleteAnswer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'complete-answer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complete_id'); ?>
		<?php echo $form->textField($model,'complete_id'); ?>
		<?php echo $form->error($model,'complete_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
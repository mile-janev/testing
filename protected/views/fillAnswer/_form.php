<?php
/* @var $this FillAnswerController */
/* @var $model FillAnswer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fill-answer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textField($model,'correct',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fill_id'); ?>
		<?php echo $form->textField($model,'fill_id'); ?>
		<?php echo $form->error($model,'fill_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
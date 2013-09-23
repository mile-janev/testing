<?php
/* @var $this TestController */
/* @var $model Test */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'tester_id'); ?>
		<?php // echo $form->textField($model,'tester_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end'); ?>
		<?php echo $form->textField($model,'end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Пребарај', array('class'=>'odgovaraj_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
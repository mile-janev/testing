<?php
/* @var $this FillReplyController */
/* @var $model FillReply */
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
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Пребарај', array('class'=>'odgovaraj_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
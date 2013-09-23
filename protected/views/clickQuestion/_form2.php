<?php
/* @var $this ClickQuestionController */
/* @var $model ClickQuestion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'click-question-form2',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата со <span class="required">*</span> се задолжителни.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textArea($model,'question',array('rows'=>5, 'cols'=>55)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer1'); ?>
		<?php echo $form->radioButton($model, 'correct', array('value'=>'answer1', 'uncheckValue'=>null)); ?><?php echo $form->textField($model,'answer1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'answer1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer2'); ?>
		<?php echo $form->radioButton($model, 'correct', array('value'=>'answer2', 'uncheckValue'=>null)); ?><?php echo $form->textField($model,'answer2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'answer2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer3'); ?>
		<?php echo $form->radioButton($model, 'correct', array('value'=>'answer3', 'uncheckValue'=>null)); ?><?php echo $form->textField($model,'answer3',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'answer3'); ?>
	</div>

	<div class="row">
            <?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row buttons">
            <?php echo CHtml::submitButton('Зачувај', array('class'=>'odgovaraj_test')); ?>
            <?php echo CHtml::submitButton('Избриши', array('submit'=>Yii::app()->createUrl('clickQuestion/delete&id='.$_GET['id'].'&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
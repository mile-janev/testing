<?php
/* @var $this ClickQuestionController */
/* @var $model ClickQuestion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'click-question-form',
        'action'=>Yii::app()->createUrl('//clickQuestion/create&test_id='.$_GET['test_id'].'&type=click'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата означени со <span class="required">*</span> се задолжителни.<br />
        Обележете го точниот одговор со клик на копчето пред него.</p>
        
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
            <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
            <?php echo CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('clickQuestion/index&test_id='.$_GET['test_id'].'&type=click'), 'class'=>'pogledni_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
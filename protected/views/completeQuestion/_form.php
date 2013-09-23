<?php
/* @var $this CompleteQuestionController */
/* @var $model CompleteQuestion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'complete-question-form',
        'action'=>Yii::app()->createUrl('//completeQuestion/create&test_id='.$_GET['test_id'].'&type=complete'),
        'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата означени со <span class="required">*</span> се задолжителни.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textArea($model,'question',array('rows'=>5, 'cols'=>55)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textArea($model,'correct',array('rows'=>5, 'cols'=>55)); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
                <?php echo CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('completeQuestion/index&test_id='.$_GET['test_id'].'&type=complete'), 'class'=>'pogledni_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
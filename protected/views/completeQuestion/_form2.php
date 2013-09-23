<?php
/* @var $this CompleteQuestionController */
/* @var $model CompleteQuestion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'complete-question-form2',
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
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textArea($model,'correct',array('rows'=>5, 'cols'=>55)); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Зачувај', array('class'=>'odgovaraj_test')); ?>
                <?php echo CHtml::submitButton('Избриши', array('submit'=>Yii::app()->createUrl('completeQuestion/delete&id='.$_GET['id'].'&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
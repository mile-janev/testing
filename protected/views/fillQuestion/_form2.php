<?php
/* @var $this FillQuestionController */
/* @var $model FillQuestion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fill-question-form2',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата со <span class="required">*</span> се задолжителни.</p>
        <p class="note">Ставете долна линија ( _____ ) онаму каде што сакате да стои одговорот.</p>
        
	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textArea($model,'question',array('rows'=>5, 'cols'=>55)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correct'); ?>
		<?php echo $form->textField($model,'correct',array('size'=>62,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'correct'); ?>
	</div>

	<div class="row buttons">
            <?php echo CHtml::submitButton('Зачувај', array('class'=>'odgovaraj_test')); ?>
            <?php echo CHtml::submitButton('Избриши', array('submit'=>Yii::app()->createUrl('fillQuestion/delete&id='.$_GET['id'].'&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
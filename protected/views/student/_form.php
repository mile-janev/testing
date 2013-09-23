<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата со <span class="required">*</span> се задолжителни.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'password2'); ?>
            <?php echo $form->passwordField($model, 'password2', array('size'=>40, 'maxlength'=>40)); ?>
            <?php echo $form->error($model, 'password2'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'index'); ?>
		<?php echo $form->textField($model,'index',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>40,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>40,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Внеси' : 'Зачувај', array('class'=>'vnes')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
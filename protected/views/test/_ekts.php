<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Полињата со <span class="required">*</span> се задолжителни.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                        'model'=>$model, //Model object
                        'mode'=>'datetime', //use "time","date" or "datetime" (default)
                        'attribute'=>'start',//attribute name
                        'language'=>'mk',
                        'options'=>array(
                            'showSecond'=>true,
                            'dateFormat'=>'yy-mm-dd',
                            'timeFormat'=>'hh:mm:ss',
                        ) // jquery plugin options
                    ));
                ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                        'model'=>$model, //Model object
                        'attribute'=>'end', //attribute name
                        'mode'=>'datetime', //use "time","date" or "datetime" (default)
                        'language'=>'mk',
                        'options'=>array(
                            'showSecond'=>true,
                            'dateFormat'=>'yy-mm-dd',
                            'timeFormat'=>'hh:mm:ss',
                        ) // jquery plugin options
                    ));
                ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Продолжи', array('class'=>'odgovaraj_test')); ?>
	</div>
<p class="note"><span class="required">*</span>ЕКТС тестот содржи 10 прашања со избор, 5 прашања со дополнување и 5 со давање на целосен одговор.</p>
<?php $this->endWidget(); ?>

</div><!-- form -->
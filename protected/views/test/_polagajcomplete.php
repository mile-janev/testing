<?php
    foreach ($prasanja3 as $prasanje)
    {
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'complete-question-answer',
        'action'=>Yii::app()->createUrl('/completeAnswer/saveanswer'),
	'enableAjaxValidation'=>false,
)); ?>
    <div class="prasanje_odgovaranje">
        <?php echo "<b>Прашање:</b> ".$prasanje['question'];?><br />
        <?php echo CHtml::textArea('answer'); ?><br />
        <?php echo CHtml::hiddenField('complete_id', $prasanje['id']); ?>
        <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
    </div>
<?php $this->endWidget(); ?>
<?php }?>

<?php
    foreach ($prasanja2 as $prasanje)
    {
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fill-question-answer',
        'action'=>Yii::app()->createUrl('/fillAnswer/saveanswer'),
	'enableAjaxValidation'=>false,
)); ?>
    <div class="prasanje_odgovaranje">
        <?php echo "<b>Прашање:</b> ".$prasanje['question'];?><br />
        <?php echo CHtml::textArea('answer'); ?><br />
        <?php echo CHtml::hiddenField('fill_id', $prasanje['id']); ?>
        <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
    </div>
<?php $this->endWidget(); ?>
<?php }?>

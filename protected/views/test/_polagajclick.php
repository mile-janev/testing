<?php
    foreach ($prasanja1 as $prasanje)
    {
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'click-question-answer',
        'action'=>Yii::app()->createUrl('/clickAnswer/saveanswer'),
	'enableAjaxValidation'=>false,
)); ?>
    <div class="prasanje_odgovaranje">
        <?php echo "<b>Прашање:</b> ".$prasanje['question'];?><br />
        <?php echo CHtml::radioButton('answer', false, array('value'=>'answer1', 'uncheckValue'=>null)); ?><?php echo $prasanje['answer1'];?><br />
        <?php echo CHtml::radioButton('answer', false, array('value'=>'answer2', 'uncheckValue'=>null)); ?><?php echo $prasanje['answer2'];?><br />
        <?php echo CHtml::radioButton('answer', false, array('value'=>'answer3', 'uncheckValue'=>null)); ?><?php echo $prasanje['answer3'];?><br />
        <?php echo CHtml::hiddenField('click_id', $prasanje['id']); ?>
        <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
    </div>
<?php $this->endWidget(); ?>
<?php }?>

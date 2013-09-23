<?php
/* @var $this ClickAnswerController */
/* @var $model ClickAnswer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correct')); ?>:</b>
	<?php echo CHtml::encode($data->correct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('click_id')); ?>:</b>
	<?php echo CHtml::encode($data->click_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />


</div>
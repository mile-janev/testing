<?php
/* @var $this FillAnswerController */
/* @var $model FillAnswer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correct')); ?>:</b>
	<?php echo CHtml::encode($data->correct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fill_id')); ?>:</b>
	<?php echo CHtml::encode($data->fill_id); ?>
	<br />


</div>
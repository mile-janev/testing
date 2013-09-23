<?php
/* @var $this TutorialController */
/* @var $model Tutorial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('explination')); ?>:</b>
	<?php echo CHtml::encode($data->explination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_id')); ?>:</b>
	<?php echo CHtml::encode($data->test_id); ?>
	<br />


</div>